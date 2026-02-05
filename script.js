// Game variables
let cards = [];
let flippedCards = [];
let matchedPairs = 0;
let moves = 0;
let seconds = 0;
let timerInterval;
let gameStarted = false;

// Card emojis
const emojis = ['🎮', '🎯', '🎨', '🎭', '🎪', '🎸', '🎲', '🎳'];

// Initialize game
function initGame() {
    const gameBoard = document.getElementById('gameBoard');
    gameBoard.innerHTML = '';
    
    // Create pairs of cards
    const cardValues = [...emojis, ...emojis];
    
    // Shuffle cards
    cardValues.sort(() => Math.random() - 0.5);
    
    // Create card elements
    cards = cardValues.map((emoji, index) => {
        const card = document.createElement('div');
        card.className = 'card';
        card.dataset.index = index;
        card.dataset.emoji = emoji;
        card.innerHTML = `<div class="card-content">${emoji}</div>`;
        card.addEventListener('click', flipCard);
        gameBoard.appendChild(card);
        return card;
    });
    
    // Reset stats
    flippedCards = [];
    matchedPairs = 0;
    moves = 0;
    seconds = 0;
    gameStarted = false;
    
    updateStats();
    
    if (timerInterval) {
        clearInterval(timerInterval);
    }
}

// Flip card
function flipCard() {
    if (!gameStarted) {
        startTimer();
        gameStarted = true;
    }
    
    // Prevent flipping more than 2 cards or already matched cards
    if (flippedCards.length >= 2 || this.classList.contains('flipped') || this.classList.contains('matched')) {
        return;
    }
    
    this.classList.add('flipped');
    flippedCards.push(this);
    
    if (flippedCards.length === 2) {
        moves++;
        updateStats();
        checkMatch();
    }
}

// Check if cards match
function checkMatch() {
    const [card1, card2] = flippedCards;
    
    if (card1.dataset.emoji === card2.dataset.emoji) {
        // Match found
        card1.classList.add('matched');
        card2.classList.add('matched');
        matchedPairs++;
        flippedCards = [];
        updateStats();
        
        // Check if game is won
        if (matchedPairs === emojis.length) {
            setTimeout(showWinModal, 500);
        }
    } else {
        // No match
        setTimeout(() => {
            card1.classList.remove('flipped');
            card2.classList.remove('flipped');
            flippedCards = [];
        }, 1000);
    }
}

// Update stats display
function updateStats() {
    document.getElementById('moves').textContent = moves;
    document.getElementById('matches').textContent = `${matchedPairs}/${emojis.length}`;
}

// Timer
function startTimer() {
    timerInterval = setInterval(() => {
        seconds++;
        document.getElementById('timer').textContent = `${seconds}s`;
    }, 1000);
}

// Show win modal
function showWinModal() {
    clearInterval(timerInterval);
    
    document.getElementById('finalMoves').textContent = moves;
    document.getElementById('finalTime').textContent = seconds;
    document.getElementById('hiddenMoves').value = moves;
    document.getElementById('hiddenTime').value = seconds;
    
    document.getElementById('winModal').style.display = 'block';
}

// Close modal
function closeModal() {
    document.getElementById('winModal').style.display = 'none';
    resetGame();
}

// Reset game
function resetGame() {
    if (timerInterval) {
        clearInterval(timerInterval);
    }
    initGame();
}

// Initialize game on page load
document.addEventListener('DOMContentLoaded', initGame);
