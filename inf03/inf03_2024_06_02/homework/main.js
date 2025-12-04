const replies = [
    "Hej, świetnie!",
    "Nie mogę się doczekać!",
    "Co jeszcze planujemy?",
    "Może później?",
    "Dobra decyzja!",
    "Zgadza się.",
    "Brzmi dobrze.",
    "Ciekawy pomysł!",
    "Spróbujmy!"
];

function sendMessage() {
    const messageInput = document.getElementById('messageInput').value;
    const chat = document.querySelector('#chat');
    const newMessage = document.createElement('div');
    newMessage.classList.add('message', 'jolanta');
    newMessage.innerHTML = "<img src='Jolka.jpg' alt='Jolanta Nowak'><p>" + messageInput + "</p>";
    chat.appendChild(newMessage);
    newMessage.scrollIntoView();
    messageInput.value = '';
}

function generateRandomReply() {
    const randomIndex = Math.floor(Math.random() * replies.length);
    const replyText = replies[randomIndex];
    const chat = document.querySelector('#chat');
    const newMessage = document.createElement('div');
    newMessage.classList.add('message', 'krzysztof');
    newMessage.innerHTML = "<img src='Krzysiek.jpg' alt='Krzysztof Łukasiński'><p>" + replyText + "</p>";
    chat.appendChild(newMessage);
    newMessage.scrollIntoView();
}
