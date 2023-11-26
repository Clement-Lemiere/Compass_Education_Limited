import React, { useState, useEffect } from 'react';

const LanguageCard = (props) => {
    const [language, setLanguage] = useState([]);
    const [expandedCards, setExpandedCards] = useState(Array.from({ length: 3 }).fill(false));
    const [showWords, setShowWords] = useState(false);

    useEffect(() => {
        // Fetch language data from the API
        fetch('https://localhost:8000/api/languages')
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then((language) => {
                setLanguage(language['hydra:member']);
            })
            .catch((error) => {
                console.error('Error fetching language data:', error);
            });
    }, []);

    const imagePath = (lang) => `/images/flags/${lang.imageName}`;

    const handleCardClick = (index) => {
        setExpandedCards((prev) => {
            const newExpandedCards = [...prev];
            newExpandedCards.fill(false);
            newExpandedCards[index] = true;
            return newExpandedCards;
        });

        setTimeout(() => {
            setShowWords(true);
        }, 100);
    };

    return (
        
        <>
            <h2>Click on the following language cards to get more details on the language.</h2>
            <div className="cardContainer">
                {language.map((lang, index) => (
                    <div
                        className={`card ${expandedCards[index] ? 'expanded' : ''}`}
                        key={index}
                        onClick={() => handleCardClick(index)}
                    >
                        <div className="cardImg">
                            <img src={imagePath(lang)} alt={lang.name} />
                        </div>
                        <h3>{lang.name}</h3>
                        <div className="cardDescription">
                            <p>{lang.description}</p>
                            <a className="cardBtn" href="/login">Choose {lang.name}</a>
                        </div>
                    </div>
                ))}
            </div>
        </>
    );
}

export default LanguageCard;
