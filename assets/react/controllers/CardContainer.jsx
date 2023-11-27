import React from 'react';

const CardContainer = () => {
    return (

        <section className="cardSection" id="why_us">
            <h2>Pourquoi nous choisir?</h2>
            <div className="cardContainer">
                <div className="card">
                    <h3>Locuteurs natifs</h3>
                    <p>Des professeurs qualifiés et locuteurs natifs, possédant une expérience de travail</p>
                </div>
                <div className="card">
                    <h3>Communication</h3>
                    <p>Tous les professeurs parlent au moins une autre langue étrangère</p>
                </div>
                <div className="card">
                    <h3>Large éventail de cours</h3>
                    <p>Nous offrons divers programmes d'études</p>
                </div>
                <div className="card">
                    <h3>Approche individuelle</h3>
                    <p>Plans personnalisés ou combinaisons de divers cours</p>
                </div>
                <div className="card">
                    <h3>Première leçon gratuite !</h3>
                    <p>Leçon d'essai gratuite de 30 minutes</p>
                </div>
                <div className="card">
                    <h3>Payez après!</h3>
                    <p>Le paiement a lieu après la leçon.</p>
                </div>
            </div>
            <div className="discoverBtn">
                <a href="/languages">Try it now!</a>
            </div>
        </section>
    );
}

export default CardContainer;