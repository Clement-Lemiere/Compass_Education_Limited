import React, { useState } from "react";

const Footer = () => {
    const [showLegal, setShowLegal] = useState(false);

    const toggleLegal = () => {
        setShowLegal(!showLegal);
    };

    return (
        <section>
            <p className="copyright">Copyright &copy; 2023 Compass_Education_Limited, all rights reserved, created by Lemière Clément & Parsy Julien.</p>
            <div className={`legals ${showLegal ? 'showLegal' : ''}`} onClick={toggleLegal}>
                <h4>Legal Informations</h4>
                <div>
                    <h5>Collection and Use of Personal Information</h5>
                    <p>When filling out forms on our site, you are asked to provide us with certain personal information. This information will only be used for the purpose of providing you with our services and for identification in the event of any future use of our site. After filling out the forms, the information you provide will not be shared with other users or transferred to any third parties.</p>
                </div>
                <div>
                    <h5>User Data</h5>
                    <p>Like many other operators, we collect certain personal data that your browser sends each time you visit our site (“user data”). These data may include information such as: the "IP address" of your computer, type of browser, pages visited on our site, the time of visit and other statistics. All information collected is used to help us improve the functioning of the website.</p>
                </div>
                <div>
                    <h5>Security</h5>
                    <p>The security of your personal information is of the utmost importance to us, but remember that no method of sending or storing information on the Internet is 100% secure. Although we strive to employ every practical means of protecting your privacy, there can be no absolute guarantee of its security.</p>
                </div>
                <div>
                    <h5>Credits</h5>
                    <div class="credits">
                        <p>Icons provided by : <a href="https://fontawesome.com/" target="_blank" rel="noopener noreferrer">Font Awesome</a></p>
                        <p>Fonts by : <a href="https://fonts.google.com/" target="_blank" rel="noopener noreferrer">Google Fonts</a></p>
                        <p>Images from : <a href="https://unsplash.com/" target="_blank" rel="noopener noreferrer">Unsplash</a></p>
                        <p>Logo from : <a href="https://www.vecteezy.com/" target="_blank" rel="noopener noreferrer">Vecteezy</a></p>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default Footer;