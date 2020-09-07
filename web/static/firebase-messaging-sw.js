/* eslint-disable */
importScripts('https://www.gstatic.com/firebasejs/7.19.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.19.1/firebase-messaging.js');

var firebaseConfig = {
  apiKey: "AIzaSyAMZM3lHMfIlA4tWT6uLLI2hpxhvDUebKo",
  authDomain: "sample-noti-565e0.firebaseapp.com",
  databaseURL: "https://sample-noti-565e0.firebaseio.com",
  projectId: "sample-noti-565e0",
  storageBucket: "sample-noti-565e0.appspot.com",
  messagingSenderId: "962236160307",
  appId: "1:962236160307:web:cdde9edd205e74ef81c646",
  measurementId: "G-J6EGCSPBPD"
};
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
