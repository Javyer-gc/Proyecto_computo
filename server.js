import express from 'express'
import bcrypt from 'bcrypt'
import stripe from 'stripe'
import { initializeApp } from 'firebase/app'
import { getFirestore, doc, collection, setDoc, getDoc, updateDoc } from 'firebase/firestore'

//Configuración de Firebase
/*
const firebaseConfig = {
  apiKey: "AIzaSyAAacih3wIMgLJZdz5zhizbIGWfN35ks4I",
  authDomain: "demoecommerce-6f7c4.firebaseapp.com",
  projectId: "demoecommerce-6f7c4",
  storageBucket: "demoecommerce-6f7c4.appspot.com",
  messagingSenderId: "506541339527",
  appId: "1:506541339527:web:901a1b8d1638b0335d9922"
}

const firebase = initializeApp(firebaseConfig)
const db = getFirestore()

*/
//inicialización del servidor
const app = express()

//middleware
app.use(express.static('public'))
app.use(express.json()) // permite compartir forms

// Rutas
// Ruta Home
app.get('/', (req, res) => {
	res.sendFile('index.html', { root: 'public'})
})

// Ruta login
/*
app.get('/login', (req, res) => {
  res.sendFile('login.html', { root: 'public'})
})
*/

app.listen(3000, () => {
	console.log('Servidor en Ejecución...')
})

