import React, { useState, useEffect } from 'react';
import Test from '../../images/test.png';

function LessonRoom() {
    const [lessons, setLessons] = useState([]);
    const [userLevel, setUserLevel] = useState('');

    useEffect(() => {
        const fetchLessons = async () => {
            try {
                const userApiUrl = 'https://localhost:8000/api/me';
                const userResponse = await fetch(userApiUrl);
                const userData = await userResponse.json();

                // Assuming user object has a 'level' and 'language' property
                const level = userData.student.level;
                const languageId = userData.student.language.id;

                const lessonsApiUrl = `https://localhost:8000/api/lessons?level=${level}&language=${languageId}`;
                const lessonsResponse = await fetch(lessonsApiUrl);

                if (!lessonsResponse.ok) {
                    throw new Error(`HTTP error! Status: ${lessonsResponse.status}`);
                }

                const lessonsData = await lessonsResponse.json();

                setLessons(lessonsData);
                setUserLevel(level);
            } catch (error) {
                console.error('Error fetching lessons:', error);
                // Display a friendly error message to the user
                alert('Error fetching lessons. Please try again later.');
            }
        };

        fetchLessons();
    }, []);
    
    const filteredLessons = Array.isArray(lessons) ? lessons.filter(lesson => lesson.level === userLevel) : [];

    if (lessons === null || lessons === undefined) {
        return <div>Loading...</div>;
    }
    return (
        <main>
            <h1>Lessons</h1>
            <ul>
                {filteredLessons.map((lesson) => (
                    <li key={lesson.id}>{lesson.title}</li>
                    // Add more details as needed, e.g., lesson.content, lesson.level, etc.
                ))}
            </ul>
        </main>
    );
}

export default LessonRoom;