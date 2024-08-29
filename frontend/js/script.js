let toggleBtn = document.getElementById('toggle-btn');
let body = document.body;
let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () =>{
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enableDarkMode();
}

toggleBtn.onclick = (e) =>{
   darkMode = localStorage.getItem('dark-mode');
   if(darkMode === 'disabled'){
      enableDarkMode();
   }else{
      disableDarkMode();
   }
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   search.classList.remove('active');
}

let search = document.querySelector('.header .flex .search-form');

document.querySelector('#search-btn').onclick = () =>{
   search.classList.toggle('active');
   profile.classList.remove('active');
}

let sideBar = document.querySelector('.side-bar');

document.querySelector('#menu-btn').onclick = () =>{
   sideBar.classList.toggle('active');
   body.classList.toggle('active');
   document.getElementById("content-wrapper").classList.toggle("active");
}


document.querySelector('#close-btn').onclick = () =>{
   sideBar.classList.remove('active');
   body.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   search.classList.remove('active');

   if(window.innerWidth < 1200){
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }
}





let localStream;
let remoteStream;
let peerConnection;
const configuration = {
    iceServers: [
        { urls: 'stun:stun.l.google.com:19302' }
    ]
};

const joinButton = document.getElementById('joinButton');
const toggleCameraButton = document.getElementById('toggleCameraButton');
const toggleMicButton = document.getElementById('toggleMicButton');
const hangupButton = document.getElementById('hangupButton');
const sendButton = document.getElementById('sendButton');
const chatInput = document.getElementById('chat-input');
const chatBox = document.getElementById('chat-box');
const localVideo = document.getElementById('localVideo');
const remoteVideo = document.getElementById('remoteVideo');

let isCameraOn = true;
let isMicOn = true;

joinButton.addEventListener('click', join);
toggleCameraButton.addEventListener('click', toggleCamera);
toggleMicButton.addEventListener('click', toggleMic);
hangupButton.addEventListener('click', hangup);
sendButton.addEventListener('click', sendMessage);

function join() {
    navigator.mediaDevices.getUserMedia({ video: true, audio: true })
        .then(stream => {
            localVideo.srcObject = stream;
            localStream = stream;
            toggleCameraButton.disabled = false;
            toggleMicButton.disabled = false;
            hangupButton.disabled = false;
            joinButton.disabled = true;

            // Setup WebRTC connection here
            setupPeerConnection();

            // Add local stream tracks to the peer connection
            localStream.getTracks().forEach(track => {
                peerConnection.addTrack(track, localStream);
            });
        })
        .catch(error => {
            console.error('Error accessing media devices.', error);
        });
}

function setupPeerConnection() {
    peerConnection = new RTCPeerConnection(configuration);
    peerConnection.addEventListener('icecandidate', event => {
        if (event.candidate) {
            // Send the candidate to the remote peer
            console.log('ICE candidate', event.candidate);
        }
    });
    peerConnection.addEventListener('track', event => {
        remoteVideo.srcObject = event.streams[0];
    });
    // Create offer and set local description
    peerConnection.createOffer()
        .then(offer => {
            return peerConnection.setLocalDescription(offer);
        })
        .then(() => {
            // Send the offer to the remote peer
            console.log('Offer sent');
        })
        .catch(error => {
            console.error('Error creating offer.', error);
        });
}

function hangup() {
    peerConnection.close();
    peerConnection = null;
    hangupButton.disabled = true;
    toggleCameraButton.disabled = true;
    toggleMicButton.disabled = true;
    joinButton.disabled = false;
}

function toggleCamera() {
    isCameraOn = !isCameraOn;
    localStream.getVideoTracks()[0].enabled = isCameraOn;
    toggleCameraButton.textContent = isCameraOn ? 'Turn Camera Off' : 'Turn Camera On'; 
} 

function toggleMic() {
    isMicOn = !isMicOn;
    localStream.getAudioTracks()[0].enabled = isMicOn;
    toggleMicButton.textContent = isMicOn ? 'Mute' : 'Unmute';
}

function sendMessage() {
    const message = chatInput.value;
    if (message) {
        // Display message in chat box
        const messageElement = document.createElement('div');
        messageElement.textContent = `You: ${message}`;
        chatBox.appendChild(messageElement);
        chatInput.value = '';

        // Send message to the remote peer (you need to implement this part)
        // For example, using a WebSocket connection
    }
}

// Add code here to handle signaling server communication for exchanging ICE candidates and SDP.
 