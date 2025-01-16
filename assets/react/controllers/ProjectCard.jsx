import React from 'react';

const ProjectCard = ({ title, description, createdAt, screenshot, link, technologies }) => {
    return (
        <div className="project-card">
            <div className="project-card-header">
                <h3>{title}</h3>
                <p>Créé le {new Date(createdAt).toLocaleDateString()}</p>
            </div>

            <img
                src={screenshot}
                alt={`${title} screenshot`}
                className="project-card-image"
            />

            <div className="project-card-body">
                <p>{description}</p>
                <div className="project-technologies">
                    <strong>Technologies:</strong>
                    {technologies.length > 0 ? (
                        <ul>
                            {technologies.map((tech, index) => (
                                <li key={index}>
                                    {tech.name} <img src={tech.logo} alt={`${tech.name} logo`} className="tech-logo" />
                                </li>
                            ))}
                        </ul>
                    ) : (
                        <p>Aucune technologie spécifiée.</p>
                    )}
                </div>
            </div>

            <div className="project-card-footer">
                <a href={link} target="_blank" rel="noopener noreferrer">
                    Voir le projet
                </a>
            </div>
        </div>
    );
};

export default ProjectCard;
