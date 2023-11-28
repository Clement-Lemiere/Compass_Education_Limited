import React from "react";

const LeyliPic = require('../../images/test.png');
const ChrisPic = require('../../images/test.png');

const AboutUs = () => {

    return (

        <section className="whoAreWeSection" id="whoAreWe">
            <h2>WHO ARE WE?</h2>
            <h3>Leyli Aleksanyan</h3>
            <div className="whoAreWeProfile">
                <div className="imgContainer">
                    <img src={ LeyliPic } alt="CEO Leyli Aleksanyan"/>
                </div>
                <p> Corrupti adipisci illo at ut iure, ducimus eum! Exercitationem autem animi cum adipisci nobis quae culpa! Facilis nisi, officia officiis dignissimos quia rerum architecto quam porro deleniti distinctio repudiandae placeat, adipisci ea molestias assumenda quidem reprehenderit minus eaque ducimus maxime tempora excepturi! Locuteurs natifs Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, est. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam delectus, voluptas blanditiis inventore tempore nisi obcaecati, optio cum sapiente a, nemo officia dolor veritatis. Recusandae, incidunt adipisci ipsum voluptate rerum iure consequuntur quo minus!</p>
            </div>
            <h3>Christopher Dorchies</h3>
            <div className="whoAreWeProfile reverseProfile">
                <div className="imgContainer">
                    <img src={ ChrisPic } alt="CEO Christopher Dorchies"/>
                </div>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti adipisci illo at ut iure, ducimus eum! Exercitationem autem animi cum adipisci nobis quae culpa! Facilis nisi, officia officiis dignissimos quia rerum architecto quam porro deleniti distinctio repudiandae placeat, adipisci ea molestias assumenda quidem reprehenderit minus eaque ducimus maxime tempora excepturi! Locuteurs natifs Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, est. Recusandae, incidunt adipisci ipsum voluptate rerum iure consequuntur quo minus! Ex beatae iure ducimus illo dolore odio aperiam, fugiat nesciunt, ratione non libero provident ipsa esse.</p>
            </div>
            <div className="whoAreWeBtn">
                <a href="/about">About us</a>
            </div>
        </section>

    )

}

export default AboutUs;