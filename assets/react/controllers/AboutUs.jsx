import React from "react";

const AboutUsPic = require('../../images/about_section.jpg');
const PlatformPic = require('../../images/diagram_screen.jpg');

const AboutUs = () => {

    return (

        <section className="whoAreWeSection" id="whoAreWe">
            <h2>WHO ARE WE?</h2>
            <h3>About Us</h3>
            <div className="whoAreWeProfile">
                <div className="imgContainer">
                    <img src={ AboutUsPic } alt="About us section"/>
                </div>
                <p> At Compass Educational Limited, our mission is to create a hub of linguistic excellence that transcends borders. Our dynamic team of educators, led by Chris and Leyli, is committed to providing an immersive and engaging language learning experience. As we embark on this virtual journey together, our state-of-the-art online platform awaits to transform your language learning adventure.</p>
            </div>
            <h3>Discover Our Platform</h3>
            <div className="whoAreWeProfile reverseProfile">
                <div className="imgContainer">
                    <img src={ PlatformPic } alt="Studying Platform"/>
                </div>
                <p> Step into our virtual campus, where innovation meets education. Our user-friendly platform is designed to make your learning experience seamless and interactive. From personalized lessons to collaborative projects, we offer a diverse range of tools to empower both students and teachers on their language learning odyssey.</p>
            </div>
            <div className="whoAreWeBtn">
                <a href="/about">More Infos</a>
            </div>
        </section>

    )

}

export default AboutUs;