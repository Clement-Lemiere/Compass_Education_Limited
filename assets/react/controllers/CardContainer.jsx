import React from 'react';

const CardContainer = () => {
    return (
        <section className="cardSection" id="why_us">
            <h2>WHY CHOOSE US ?</h2>
            <div className="cardContainer">
                <div className="card">
                    <h3>Tailored Learning Paths</h3>
                    <p>Experience personalized lessons that adapt to your pace and language learning goals.</p>
                </div>
                <div className="card">
                    <h3>Cutting-edge Learning Technology</h3>
                    <p>Explore the latest in online language learning tools for an immersive and tech-savvy educational experience.</p>
                </div>
                <div className="card">
                    <h3>Global Community Connection</h3>
                    <p>Connect with learners worldwide, fostering cultural exchange and expanding your global network.</p>
                </div>
                <div className="card">
                    <h3>Expert Instructors</h3>
                    <p>Learn from experienced educators dedicated to your success.</p>
                </div>
                <div className="card">
                    <h3>Cultural Insights</h3>
                    <p>Gain a deeper understanding of diverse cultures as you learn, broadening your global perspective.</p>
                </div>
                <div className="card">
                    <h3>Interactive Learning Materials</h3>
                    <p>Engage with dynamic and interactive materials that make your learning experience both enjoyable and effective.</p>
                </div>
                <div className="card">
                    <h3>Practical Language Application</h3>
                    <p>Apply your language skills in real-world scenarios, ensuring practical proficiency in your chosen language.</p>
                </div>
                <div className="card">
                    <h3>Professional Development</h3>
                    <p>Acquire language skills that enhance your professional profile and open doors to global career opportunities.</p>
                </div>
                <div className="card">
                    <h3>Continuous Support and Feedback</h3>
                    <p>Receive ongoing support from our dedicated instructors and constructive feedback to accelerate your language learning journey.</p>
                </div>
            </div>
            <div className="discoverBtn">
                <a href="/languages">Try it now!</a>
            </div>
        </section>
    );
}

export default CardContainer;