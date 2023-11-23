import React, { useState, useEffect } from 'react';

const LanguageCard = (props) => {
    const [language, setLanguage] = useState([]);
    const [expandedCards, setExpandedCards] = useState(Array.from({ length: 3 }).fill(false));
    const [showWords, setShowWords] = useState(false);

    useEffect(() => {
        // Fetch language data from the API
        fetch('https://localhost:8000/api/languages')
            .then((response) => {
                return response.json();
            })
            .then((language) => {
                setLanguage(language['hydra:member']);
            })
        }, [])
        
        console.log(language);
        
        
    const image = language.imageName ? language.imageName.getUrl() : null;

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
        <section>
            <h1>Choose the language you want to study.</h1>
            <div className="cardContainer">
                {language.map((language, index) => (
                    <div
                        className={`card ${expandedCards[index] ? 'expanded' : ''}`}
                        key={index}
                        onClick={() => handleCardClick(index)}
                    >
                        <div className="cardImg">
                            <img src={image} alt={language.name} />
                        </div>
                        <h2>{language.name}</h2>
                        <div className="cardDescription">
                            <p>{language.description}</p>
                            <a className="cardBtn" href="/login">Choose {language.name}</a>
                        </div>
                    </div>
                ))}
            </div>
        </section>
    );
}

export default LanguageCard;
