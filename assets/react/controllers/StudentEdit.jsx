import React, { useState, useEffect } from 'react';
import Test from '../../images/empty.png';

function EditStudent() {

    const [user, setUser] = useState({});
    const [formData, setFormData] = useState({
        firstname: '',
        lastname: '',
        birthdate: '',
        nationality: '',
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
                firstname: userData.student.firstName,
                lastname: userData.student.lastName,
                birthdate: userData.student.birthdate,
                nationality: userData.student.nationality,
                email: userData.student.email,
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
                firstname: updatedUserData.student.firstName,
                lastname: updatedUserData.student.lastName,
                birthdate: updatedUserData.student.birthdate,
                nationality: updatedUserData.student.nationality,
                email: updatedUserData.student.email,
                password: '',
            });
        } catch (error) {
            alert('Error updating profile:', error);
        }

    };

    // const handleFileChange = (e) => {
    //     const selectedFile = e.target.files[0];
    //     if (!selectedFile) {
    //         return;
    //     }

    //     // Check file size and type
    //     if (selectedFile.size > 1024 * 1024) {
    //         alert('File size exceeds the limit of 1MB');
    //         return;
    //     }

    //     if (!['image/jpeg', 'image/png'].includes(selectedFile.type)) {
    //         alert('Only JPEG and PNG images are allowed');
    //         return;
    //     }

    //     // Upload the selected file
    //     // ...

    //     // Update the profile image preview
    //     const fileReader = new FileReader();
    //     fileReader.onload = (event) => {
    //         setProfileImage(event.target.result);
    //     };
    //     fileReader.readAsDataURL(selectedFile);
    // };

    const navigation = [
        { name: 'Profile', href: '/sprofile' },
        { name: 'Calendar', href: '/scalendar' },
        { name: 'Progress', href: '/sprogress' },
        { name: 'Edit Profile', href: '/editSprofile' },
    ];

    const renderNavigation = () => (
        <ul className="aLeft">
            {navigation.map((item) => (
                <li key={item.name}>
                    <a href={item.href} aria-current={item.current ? 'page' : undefined}>
                        {item.name}
                    </a>
                </li>
            ))}
        </ul>
    );

    return (
        <main className='profilePage'>
            <div className="leftColumn">
                {renderNavigation()}
            </div>
            <div className="mainCtn">
                <h1>PROFILE</h1>
                <div className='profileContainer'>
                    <h2>Information</h2>
                    <div className="profileDescription">
                        <div className="profileInfo">
                            <div className="infoCtn">
                                {user.student && (
                                    <form onSubmit={handleSubmit}> 
                                        <ul>
                                            <li>
                                                <label htmlFor="firstname">Firstname :</label>
                                                <input
                                                    type="text"
                                                    placeholder={user.student.firstName}
                                                    name="firstname"
                                                    value={formData.firstname}
                                                    onChange={handleInputChange}
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="lastname">Lastname :</label>
                                                <input
                                                    type="text"
                                                    placeholder={user.student.lastName}
                                                    name="lastname"
                                                    value={formData.lastname}
                                                    onChange={handleInputChange}
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="birthdate">Birthdate :</label>
                                                <input
                                                    type="date"
                                                    placeholder="Birthdate"
                                                    name="birthdate"
                                                    value={formData.birthdate}
                                                    onChange={handleInputChange}
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="nationality">Nationality :</label>
                                                <input
                                                    type="text"
                                                    placeholder={user.student.nationality}
                                                    name="nationality"
                                                    value={formData.nationality}
                                                    onChange={handleInputChange}
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="email">Email :</label>
                                                <input
                                                    type="email"
                                                    placeholder={user.email}
                                                    name="email"
                                                    value={formData.email}
                                                    onChange={handleInputChange}
                                                />
                                            </li>
                                            <li>
                                                <label htmlFor="password">New Password:</label>
                                                <input
                                                    type="password"
                                                    id="password"
                                                    name="password"
                                                    placeholder="New Password"
                                                    value={formData.password}
                                                    onChange={handleInputChange}
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
                        <div className="profilePhoto">
                            <div className='photo'>
                                    <img
                                        src={Test}
                                        alt="My Profile Picture"
                                    />
                                {/* <form action="traitement.php" method="post" encType="multipart/form-data">
                                    <input
                                        type="file"
                                        id="photo"
                                        name="photo"
                                        accept="image/*"
                                        onChange={handleFileChange}
                                    />
                                </form> */}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    );
}

export default EditStudent;
