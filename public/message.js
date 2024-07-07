document.addEventListener('DOMContentLoaded', () => {
    const messages = [
        { sender: 'Figma', content: 'We need your contact. We need to do business.' },
        { sender: 'Figma', content: 'We need your contact. We need to do business.' },
        { sender: 'Figma', content: 'We need your contact. We need to do business.' },
        { sender: 'Figma', content: 'We need your contact. We need to do business.' },
        { sender: 'Figma', content: 'We need your contact. We need to do business.' },
        { sender: 'Figma', content: 'We need your contact. We need to do business.' },
        { sender: 'Figma', content: 'We need your contact. We need to do business.' }
    ];

    const messagesContainer = document.querySelector('.messages');

    messages.forEach(message => {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message');
        
        const messageImg = document.createElement('img');
        messageImg.src = 'https://via.placeholder.com/50/FF0000/FFFFFF?text=O';
        messageImg.alt = 'Sender Image';

        const messageContent = document.createElement('div');
        messageContent.classList.add('message-content');
        messageContent.innerHTML = `<strong>${message.sender}</strong><br>${message.content}`;

        messageElement.appendChild(messageImg);
        messageElement.appendChild(messageContent);

        messagesContainer.appendChild(messageElement);
    });
});
