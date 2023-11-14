import React, { useState, useEffect } from 'react';

const Test = require('../../images/chinese_flag.png');

function LanguageCard() {
    const [languageData, setLanguageData] = useState(null);
    const [expandedCards, setExpandedCards] = useState(Array.from({ length: 3 }).fill(false));
    const [showWords, setShowWords] = useState(false);



    useEffect(() => {
        // Fetch user data from the database
        // Replace `fetchUserData` with the actual function to fetch user data
        fetchLanguageData()
            .then((data) => setLanguageData(data))
            .catch((error) => console.log(error));

    }, []);

    // Replace `fetchUserData` with the actual function to fetch user data
    function fetchLanguageData() {
        // Implement code to fetch user data from the database
        return new Promise((resolve, reject) => {
            // Replace with the actual API endpoint or database query
            const endpoint = '/admin/language';
            fetch(endpoint)
                .then((response) => response.json())
                .then((data) => resolve(data))
                .catch((error) => reject(error));
        });
    }



    const testCard = languageData ? languageData : {
        name: "Chinese",
        description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Id temporibus optio, repellendus architecto dolores corrupti eveniet debitis minima odit expedita velit consequuntur. Sint, quas a.",
    };

    const handleCardClick = (index) => {
        setExpandedCards((prev) => {
            const newExpandedCards = [...prev];
            newExpandedCards.fill(false);
            newExpandedCards[index] = true;
            return newExpandedCards;
        });

        setTimeout(() => {
            setShowWords(true);
        }, 100);    };

    return (
        <section>
            <h1>Choose the language you want to study.</h1>
            <div className="cardCtn">
                {Array.from({ length: 6 }).map((_, index) => (
                    <div className={`card ${expandedCards[index] ? 'expanded' : ''}`} key={index} onClick={() => handleCardClick(index)}>
                        <div className='cardImg'>
                            <img src={Test} alt={`Language flag for ${testCard.name}`} />
                        </div>
                        <h2>{testCard.name}</h2>
                        <p className={`cardDescription ${expandedCards[index] ? 'expanded' : ''}`}>
                            {testCard.description.split(' ').map((word, i) => (
                                <span key={i} className={`word ${showWords ? 'show' : ''}`} style={{ transitionDelay: `${i * 0.1}s` }}>
                                    {word} 
                                </span>
                            ))}
                        </p>
                    </div>
                ))}
            </div>
        </section>
    );
}



export default LanguageCard;
