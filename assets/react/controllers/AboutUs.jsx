import React from "react";

const Test = require('../../images/test.png');

const AboutUs = () => {

    return (

        <section className="aboutUsMain" id="">
            <h2>About us</h2>
            <div>
                <h3>Leyli</h3>
            </div>
            <div className="aboutUsBlock">
                <p className="aboutUsPr"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti adipisci illo at ut iure, ducimus eum! Exercitationem autem animi cum adipisci nobis quae culpa! Facilis nisi, officia officiis dignissimos quia rerum architecto quam porro deleniti distinctio repudiandae placeat, adipisci ea molestias assumenda quidem reprehenderit minus eaque ducimus maxime tempora excepturi! Locuteurs natifs Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, est. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam delectus, voluptas blanditiis inventore tempore nisi obcaecati, optio cum sapiente a, nemo officia dolor veritatis. Recusandae, incidunt adipisci ipsum voluptate rerum iure consequuntur quo minus! Ex beatae iure ducimus illo dolore odio aperiam, fugiat nesciunt, ratione non libero provident ipsa esse.
                </p>
                <div className="aboutUsImg">
                    <img
                        src={ Test }
                        alt="About us"
                    />
                </div>
            </div>
            <div>
                <h3>Chris</h3>
            </div>
            <div className="aboutUsBlock">
                <div className="aboutUsImg">
                    <img
                        src={ Test }
                        alt="About us"
                    />
                </div>
                <p className="aboutUsPr"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti adipisci illo at ut iure, ducimus eum! Exercitationem autem animi cum adipisci nobis quae culpa! Facilis nisi, officia officiis dignissimos quia rerum architecto quam porro deleniti distinctio repudiandae placeat, adipisci ea molestias assumenda quidem reprehenderit minus eaque ducimus maxime tempora excepturi! Locuteurs natifs Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, est. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam delectus, voluptas blanditiis inventore tempore nisi obcaecati, optio cum sapiente a, nemo officia dolor veritatis. Recusandae, incidunt adipisci ipsum voluptate rerum iure consequuntur quo minus! Ex beatae iure ducimus illo dolore odio aperiam, fugiat nesciunt, ratione non libero provident ipsa esse.
                </p>
            </div>
            <div className="discoverBtn">
                <a href="#">About us</a>
            </div>
        </section>

    )

}

export default AboutUs;