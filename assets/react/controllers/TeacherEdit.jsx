import React, { useState, useEffect } from 'react';

const Test = require('../../images/empty.png');

function TeacherDashboard() {

    const [user, setUser] = useState({});
    const [formData, setFormData] = useState({
        firstname: '',
        lastname: '',
        nationality: '',
        qualification: '',
        availability: '',
        email: '',
        password: '',
    });

    useEffect(() => {
        const apiUrl = 'https://localhost:8000/api/me';
        fetchUserData(apiUrl);
    }, []);

    const fetchUserData = async (apiUrl) => {
        try {
            const response = await fetch(apiUrl);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const userData = await response.json();
            setUser(userData);
            // Pré-remplir le formulaire avec les données actuelles
            setFormData({
                firstname: userData.teacher.firstName,
                lastname: userData.teacher.lastName,
                birthdate: userData.teacher.birthdate,
                nationality: userData.teacher.nationality,
                email: userData.teacher.email,
                password: '',
            });
        } catch (error) {
            console.error('Error fetching user data:', error);
        }
    };

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });

    }

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await fetch('https://localhost:8000/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            // Le backend a traité la requête avec succès
            alert('Profile updated successfully!');

            // Assuming the backend responds with the updated user data
            const updatedUserData = await response.json();
            setUser(updatedUserData);

            // Optionally update the form data with the updated values
            setFormData({
                firstname: updatedUserData.teacher.firstName,
                lastname: updatedUserData.teacher.lastName,
                nationality: updatedUserData.teacher.nationality,
                qualification: updatedUserData.teacher.qualification,
                availability: updatedUserData.teacher.availability,
                email: updatedUserData.teacher.email,
                password: '',
            });
        } catch (error) {
            alert('Error updating profile:', error);
        }

    };



    const profileIcon = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path fill="whitesmoke" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>`;
    const calendarIcon = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path fill="whitesmoke" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>`;
    const pencilIcon = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path fill="whitesmoke" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>`;
    const bookIcon = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path fill="whitesmoke" d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" /></svg>`;



    const navigation = [
        { name: 'Profile', href: '/tprofile', icon: profileIcon },
        { name: 'Calendar', href: '/tcalendar', icon: calendarIcon },
        { name: 'Lessons', href: '/teacherLesson', icon: bookIcon },
        { name: 'Edit Profile', href: '/editTprofile', icon: pencilIcon },
    ];

    const renderNavigation = () => (
        <ul className="aLeft">
            {navigation.map((item) => (
                <li key={item.name}>
                    <a
                        href={item.href}
                        aria-current={item.current ? 'page' : undefined}
                    >
                        <i dangerouslySetInnerHTML={{ __html: item.icon }} />
                        <span className='linkWord'>{item.name}</span>
                    </a>
                </li>
            ))}
        </ul>
    );

    return (
        <main className='profilePage'>
            {/* LEFT COLUMN */}
            {renderNavigation()}
            <div className="mainCtn">
                <h1>PROFILE</h1>
                <div className='profileContainer'>
                    <h2>Information</h2>
                    <div className="profileDescription">
                        <div className="profileInfo">
                            <div className="infoCtn">
                                {user.teacher && (
                                    <form className='formContent editProfile' onSubmit={handleSubmit}>
                                        <ul>
                                            <li>
                                                <label htmlFor="firstname" className='fullNameLabel'>Firstname :</label>
                                                <input
                                                    type="text"
                                                    placeholder={user.teacher.firstName}
                                                    name="firstname"
                                                    value={formData.firstname}
                                                    onChange={handleInputChange}
                                                    className="fullNameInput"
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="lastname" className="fullNameLabel">Lastname :</label>
                                                <input
                                                    type="text"
                                                    placeholder={user.teacher.lastName}
                                                    name="lastname"
                                                    value={formData.lastname}
                                                    onChange={handleInputChange}
                                                    className="fullNameInput"
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="nationality" className="formLabel">Nationality :</label>
                                                <input
                                                    type="text"
                                                    placeholder={user.teacher.nationality}
                                                    name="nationality"
                                                    value={formData.nationality}
                                                    onChange={handleInputChange}
                                                    className="formControl"
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="qualification" className="formLabel">Qualification :</label>
                                                <input
                                                    type="select"
                                                    placeholder={user.teacher.qualification}
                                                    name="qualification"
                                                    value={formData.qualification}
                                                    onChange={handleInputChange}
                                                    className="formControl"
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="availability" className="formLabel">Availability :</label>
                                                <input
                                                    type="text"
                                                    placeholder={user.teacher.availability}
                                                    name="availability"
                                                    value={formData.availability}
                                                    onChange={handleInputChange}
                                                    className="formControl"
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="email" className="formLabel">Email :</label>
                                                <input
                                                    type="email"
                                                    placeholder={user.email}
                                                    name="email"
                                                    value={formData.email}
                                                    onChange={handleInputChange}
                                                    className="formControl"
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="password" className="formLabel">New Password:</label>
                                                <input
                                                    type="password"
                                                    id="password"
                                                    name="password"
                                                    placeholder="New Password"
                                                    value={formData.password}
                                                    onChange={handleInputChange}
                                                    className="formControl"
                                                />
                                            </li>
                                            {/* ... Other Form Fields ... */}
                                        </ul>
                                        <div>
                                            <button type="submit" className='profileBtn'>
                                                Save Changes
                                            </button>
                                        </div>
                                    </form>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    );
}

export default TeacherDashboard;