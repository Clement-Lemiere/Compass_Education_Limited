import React from 'react';

const CardContainer = () => {
    return (

        <section className="cardHomeContainer" id="why_us">
            <h2>Pourquoi nous choisir?</h2>
            <div className="cards">
                <div className="block">
                    <p className="blockTitle">Locuteurs natifs</p>
                    <p className="blockContent">Des professeurs qualifiés et locuteurs natifs, possédant une expérience de travail</p>
                </div>
                <div className="block">
                    <p className="blockTitle">Communication</p>
                    <p className="blockContent">Tous les professeurs parlent au moins une autre langue étrangère</p>
                </div>
                <div className="block">
                    <p className="blockTitle">Large éventail de cours</p>
                    <p className="blockContent">Nous offrons divers programmes d'études</p>
                </div>
                <div className="block">
                    <p className="blockTitle">Approche individuelle</p>
                    <p className="blockContent">Plans personnalisés ou combinaisons de divers cours</p>
                </div>
                <div className="block">
                    <p className="blockTitle">Première leçon gratuite !</p>
                    <p className="blockContent">Leçon d’essai gratuite de 30 minutes</p>
                </div>
                <div className="block">
                    <p className="blockTitle">Payez après!</p>
                    <p className="blockContent">Le paiement a lieu après la leçon.</p>
                </div>
            </div>
            <div className="discoverBtn">
                <a href="/prices">Try it now!</a>
            </div>
        </section>
    );
}

export default CardContainer;