import React from "react";

const TeacherPic = require('../../images/empty.png');

const ProfessorsList = () => {
    const ProfessorCard = ({ name, language, description }) => {
        return (
            <div className="teacherComponent">
                <div className="teacherInfos">
                    <h3>{name}</h3>
                    <div className="imgContainer">
                        <img src={TeacherPic} alt="teacher pic" />
                    </div>
                </div>
                <div className="description">
                    <h3>{language} teacher</h3>
                    <p>{description}</p>
                </div>
            </div>
        );
    };


    const professorsData = [
        {
            name: 'Wei Chen',
            language: 'Chinese',
            description: 'Renowned for his expertise, Wei Chen, an experienced instructor, passionately imparts the beauty of the Chinese language through interactive and stimulating teaching methods.',
        },
        {
            name: 'Emily Anderson',
            language: 'English',
            description: 'A dynamic and knowledgeable educator, Professor Anderson immerses students in the captivating realms of the English language and literature, fostering a love for learning.',
        },
        {
            name: 'Camille Leclerc',
            language: 'French',
            description: 'Delve into the world of French literature with Professor Camille Leclerc, a specialist whose captivating courses illuminate the cultural tapestry woven within the French language.',
        },
        {
            name: 'Markus Wagner',
            language: 'German',
            description: 'Professor Wagner\'s love for the German language is evident in his teachings, where grammar meets cultural nuances, creating a dynamic and enriching learning experience.',
        },
        {
            name: 'Yuki Tanaka',
            language: 'Japanese',
            description: 'Drawing from extensive experience, Yuki Tanaka brings a unique perspective to Japanese language education, offering students profound insights and understanding.',
        },
        {
            name: 'Kim Min-ho',
            language: 'Korean',
            description: 'Professor Kim Min-ho, with deep insights into language and culture, motivates students on their Korean language journey, fostering both linguistic and academic achievements.',
        },
        {
            name: 'Isabella Rossi',
            language: 'Italian',
            description: 'Immerse yourself in the Italian language and culture with Professor Rossi. Her passion is contagious, making each lesson a dynamic and communicative experience for students.',
        },
        {
            name: 'Javier Rodriguez',
            language: 'Spanish',
            description: 'Meet Javier Rodriguez, our dedicated Spanish teacher. With a deep love for the language, he guides students on an immersive journey into the richness of Spanish culture and communication.',
        }
        // Add data for other professors here...
    ];

    return (
        <section className="professorsList">
            <h2>Discover Our Teachers !</h2>
            {professorsData.map((professor, index) => (
                <ProfessorCard key={index} {...professor} />
            ))}
            <div className="back">
                <a href="#">Back to the Top</a>
            </div>
        </section>
    );
};

export default ProfessorsList;