import React, { useState, useEffect } from 'react';

const Test = require('../../images/chinese_flag.png');

function LanguageCard() {
    const [languageData, setLanguageData] = useState([]);
    const [expandedCards, setExpandedCards] = useState(Array.from({ length: 3 }).fill(false));
    const [showWords, setShowWords] = useState(false);



    useEffect(() => {
        // Fetch user data from the database
        // Replace `fetchUserData` with the actual function to fetch user data
        fetchLanguageData()
            .then((data) => setLanguageData(data))
            .catch((error) => console.log(error));

    },  []);

    function fetchLanguageData() {
        return new Promise((resolve, reject) => {
            const endpoint = '/admin/language';
            fetch(endpoint)
                .then((response) => response.json())
                .then((data) => resolve(data))
                .catch((error) => reject(error));
        });
    }




    const languages = languageData ? languageData : {
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
            <ul>
                {languages.map(languageData => <li key={languageData.id}>{languageData.name}</li>)}
            </ul>
            <div className="cardCtn">
                {Array.from({ length: 6 }).map((_, index) => (
                    <div className={`card ${expandedCards[index] ? 'expanded' : ''}`} key={index} onClick={() => handleCardClick(index)}>
                        <div className='cardImg'>
                            <img src={Test} alt={`Language flag for ${languageData.name}`} />
                        </div>
                        <h2>{languageData.name}</h2>
                        <p className="description">{languageData.description}</p>
                        {/* <p className={`cardDescription ${expandedCards[index] ? 'expanded' : ''}`}>
                            {languageData.description.split(' ').map((word, i) => (
                                <span key={i} className={`word ${showWords ? 'show' : ''}`} style={{ transitionDelay: `${i * 0.1}s` }}>
                                    {word}
                                </span>
                            ))}
                        </p> */}
                    </div>
                ))}
            </div>
        </section>
    );
}



export default LanguageCard;
