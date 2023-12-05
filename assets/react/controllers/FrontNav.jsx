import React, { useState, useEffect } from 'react';
import Logo from '../../images/logo.png';

const Links = [
    { name: 'Languages', href: '/languages' },
    { name: 'Prices', href: '/prices' },
    { name: 'Team', href: '/ourTeachers' },
    { name: 'Contact', href: '/contact' },
    { name: 'About', href: '/about' },
    { name: 'FAQ', href: '/faq' },
];

const FrontNav = () => {
    const [user, setCurrentUser] = useState({}); // Initialize user state with an empty object

    useEffect(() => {
        // Fetch user data from API on component mount
        const apiUrl = 'https://localhost:8000/api/me';
        fetchUserData(apiUrl);
    }, []);

    const fetchUserData = async (apiUrl) => {
        try {
            const response = await fetch(apiUrl); // Fetch user data from API
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const userData = await response.json(); // Parse JSON response
            setCurrentUser(userData); // Update user state with fetched data
        } catch (error) {
            console.error('Error fetching user data:', error); // Handle error
        }
    };

    // Initialize dropdown state
    const [IsDropdownOpen, setDropdownOpen] = useState(false);

    // Function to toggle the dropdown
    const toggleDropdown = () => {
        setDropdownOpen((prevIsDropdownOpen) => {
            // Toggle dropdown state and update mobileNav and closeButton classes

            // Get the reference to the mobileNav element
            const mobileNav = document.querySelector('.frontNav');
            // Get the reference to the closeButton element
            const closeButton = document.querySelector('.dropdownBtn');

            // Check if the dropdown is currently closed
            if (!prevIsDropdownOpen) {
                // Add the 'mobileNav' class to the mobileNav element to show the dropdown
                mobileNav.classList.add('mobileNav');
                // Add the 'closeBtn' class to the closeButton element to change its appearance
                closeButton.classList.add('closeBtn');
            } else {
                // Remove the 'mobileNav' class from the mobileNav element to hide the dropdown
                mobileNav.classList.remove('mobileNav');
                // Remove the 'closeBtn' class from the closeButton element to revert its appearance
                closeButton.classList.remove('closeBtn');
            }
            // Return the new dropdown state, toggled from the previous state
            return !prevIsDropdownOpen;
        });
    };

    const renderUserLogin = () => {
        // Check if the user is a student or teacher and get their first name
        const firstName = user.student?.firstName || user.teacher?.firstName;
        const isAdmin = user.email === 'admin@example.com';

        // Check if the user is a student or teacher
        if (user.student || user.teacher) {
            // Render a greeting message with the user's first name and a link to their profile
            return (
                <>
                    <a href={user.student ? "/sprofile" : "/tprofile"}>Hello, {firstName}!</a>
                </>
            );
        } else if (isAdmin) {
            return (
                <>
                    <a href="/admin/user">Hello, Admin!</a>
                </>
            );
        } else {
            // Render a login link if the user is not logged in
            return (
                <>
                    <a href="/login">Login</a>
                </>
            );
        }
    };

    return (
        <nav className="frontNav">
            <div className="logo">
                <a href="/"><img src={Logo} alt="logo" /></a>
            </div>
            <div className='dropdownBtnContainer'>
                <div className='dropdownBtn' onClick={toggleDropdown}>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <ul className="navLinks">
                {Links.map((item, index) => (
                    <li key={index}>
                        <a
                            href={item.href}
                            aria-current={item.current ? 'page' : undefined}
                        >
                            {item.name}
                        </a>
                    </li>
                ))}
            </ul>
            <div className="loginBtn">
                {/* Render the user login button */}
                {renderUserLogin()}
            </div>
        </nav>
    );
};

export default FrontNav;
