import React from 'react';

const CardContainer = () => {
    return (

        <section className="cardSection" id="why_us">
            <h2>WHY CHOOSE US ?</h2>
            <div className="cardContainer">
                <div className="card">
                    <h3>Native Speakers</h3>
                    <p>Qualified teachers and native speakers with work experience</p>
                </div>
                <div className="card">
                    <h3>Communication</h3>
                    <p>All teachers speak at least one language and can use words</p>
                </div>
                <div className="card">
                    <h3>Wide Range of Courses</h3>
                    <p>We offer various study programs, including knitting and riding Dragons </p>
                </div>
                <div className="card">
                    <h3>Individual Approach</h3>
                    <p>Customized plans or combinations of various courses</p>
                </div>
                <div className="card">
                    <h3>First Free Lesson!</h3>
                    <p>Just kidding, you are not getting anything for free.</p>
                </div>
                <div className="card">
                    <h3>Pay After!</h3>
                    <p>Payment can take place after the lesson but cost 13 times the standard lesson.</p>
                </div>
            </div>
            <div className="discoverBtn">
                <a href="/languages">Try it now!</a>
            </div>
        </section>

    );
}

export default CardContainer;