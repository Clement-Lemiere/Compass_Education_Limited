import React from 'react';

const PriceContainer = () => {
    return (


        <section className='priceSection'>
            <h2>Pricing Overview</h2>
            <p className='priceDescription'>Explore our flexible pricing options designed to cater to your language-learning needs. From the 'Discovery' plan for a single lesson to the comprehensive 'Confirmed' package for 20 lessons, we offer various durations to suit your schedule. Dive into specialized monthly subscriptions with a commitment of 6 months, ensuring consistent progress. Select from 1 to 2 lessons per week, each tailored to your desired duration. Compass School makes language mastery accessible, empowering you to embark on this transformative journey at competitive rates. Start your adventure today!</p>
            <div className="perLessons">
                <div className='priceCard'>   
                    <h3>Discovery</h3>
                    <p>1 lesson</p>
                    <div>
                        <div>30 min</div>
                        <div>45 min</div>
                        <div>60 min</div>
                    </div>
                    <div>
                        <div className="price">10 €</div>
                        <div className="price">14 €</div>
                        <div className="price">18 €</div>
                    </div>
                </div>
                <div className='priceCard'>
                    <h3>Standard</h3>
                    <p>5 lessons</p>
                    <div>
                        <div>30 min</div>
                        <div>45 min</div>
                        <div>60 min</div>
                    </div>
                    <div>
                        <div className="price">45 €</div>
                        <div className="price">63 €</div>
                        <div className="price">81 €</div>
                    </div>
                </div>
                <div className='priceCard'>
                    <h3>Confirmed</h3>
                    <p>10 lessons</p>
                    <div>
                        <div>30 min</div>
                        <div>45 min</div>
                        <div>60 min</div>
                    </div>
                    <div>
                        <div className="price">90 €</div>
                        <div className="price">125 €</div>
                        <div className="price">160 €</div>
                    </div>
                </div>
                <div className='priceCard'>
                    <h3>Discovery</h3>
                    <p>20 lessons</p>
                    <div>
                        <div>30 min</div>
                        <div>45 min</div>
                        <div>60 min</div>
                    </div>
                    <div>
                        <div className="price">170 €</div>
                        <div className="price">235 €</div>
                        <div className="price">300 €</div>
                    </div>
                </div>    
            </div>
            <div className='perMonth'>
                <h3>Specialized</h3>
                <p>Monthly Subscription</p>
                <p>Minimum commitment of 6 months, with a frequency of 1 to 2 lessons per week.</p>
                <div className="perWeekFormulas">
                    <div className='perWeek'>
                        <p>1 lesson per week</p>
                        <div>
                            <div>45 min</div>
                            <div>60 min</div>
                        </div>
                        <div>
                            <div className="price">235 €</div>
                            <div className="price">300 €</div>
                        </div>
                    </div>
                    <div className='perWeek'>
                        <p>2 lessons per week</p>
                        <div>
                            <div>45 min</div>
                            <div>60 min</div>
                        </div>
                        <div>
                            <div className="price">235 €</div>
                            <div className="price">300 €</div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="discoverBtn">
                <a href="/login">Let's get started</a>
            </div>
        </section>

    );
}

export default PriceContainer;