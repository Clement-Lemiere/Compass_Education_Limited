import React from "react";

const Test = require('../../images/empty.png');

const AboutCEL = () => {

    return (

        <section className="aboutCompass">
            <div className="aboutContainer">
                <h2>Leyli Dorchies Aleksanyan</h2>
                <div className="imgContainer">
                    <img
                        src={Test}
                        alt="About us"
                    />
                </div> 
                <p> Meet Leyli Dorchies Aleksanyan, co-founder of Compass School. Her dedication to education shines through every lesson. Leyli, a passionate linguist, guides learners with infectious energy, creating a memorable and enriching learning experience. </p>
            </div>
            <div className="aboutContainer">
                <h2> Christopher Dorchies </h2>
                <div className="imgContainerBis">
                    <img
                        src={Test}
                        alt="About us"
                    />
                </div>
                <p> Christopher, co-creator of Compass School, brings linguistic expertise and dynamism to each session. His mission is to inspire learners to embrace linguistic diversity. With Chris, every class becomes a captivating journey towards mastering a new language. </p>
            </div>
        </section>

    )

}

export default AboutCEL;