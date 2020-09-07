import * as firebase from 'firebase/app'
import 'firebase/messaging'

firebase.initializeApp({
  apiKey: 'AIzaSyAMZM3lHMfIlA4tWT6uLLI2hpxhvDUebKo',
  authDomain: 'sample-noti-565e0.firebaseapp.com',
  databaseURL: 'https://sample-noti-565e0.firebaseio.com',
  projectId: 'sample-noti-565e0',
  storageBucket: 'sample-noti-565e0.appspot.com',
  messagingSenderId: '962236160307',
  appId: '1:962236160307:web:cdde9edd205e74ef81c646',
  measurementId: 'G-J6EGCSPBPD'
})

const firebaseMessaging = firebase.messaging()
firebaseMessaging.usePublicVapidKey('BNurzhD4ca9i0ZqBKANuy8-7JVDiGD9Rsdma4Rh5ITPg0SJn8dbrgnlKw11GMv2LFzSaiqWABefkw11Zn03S2dw')

export const messaging = firebaseMessaging
