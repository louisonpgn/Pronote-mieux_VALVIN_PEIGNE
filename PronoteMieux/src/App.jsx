import { useState } from 'react';
import './App.css';

function App() {
  const [nom, setNom] = useState('');
  const [mdp, setMdp] = useState('');
  const [notes, setNotes] = useState([]);
  const [error, setError] = useState('');
  const [estConnecte, setEstConnecte] = useState(false);


  const handleConnexion = async () => {
    console.log(nom);
    console.log(mdp);

    try { 
      const response = await fetch(`https://evalvin.zzz.bordeaux-inp.fr/API.php/?utilisateur=${nom}&motdepasse=${mdp}`);
      const data = await response.json();

      // vérifie si la réponse contient une erreur d'authentification
      if (data.success === false) {
        setError(data.message);  // afficher l'erreur retournée par l'API
        setNotes([]);             // réinitialise les notes
        setEstConnecte(false);    // garder l'utilisateur déconnecté si pb
      } else if (data.success === true  && Array.isArray(data.notes)) {
        // si la réponse contient des notes, c'est que la connexion a réussi
        setNotes(data.notes);
        setError('');  // réinitialiser l'erreur
        setEstConnecte(true);  // connecter l'utilisateur à ses notes
      } else {
        setError("Erreur inattendue.") // test pour savoir d'où vien l'erreur 
      }
    } catch (err){
      setError("Erreur de connexion au serveur.")
    }
  };

  return (
    <div className="app-container">
      <div className="wave wave-left"></div>
      <div className="wave wave-right"></div>

      <div className="content-box">
        {!estConnecte ? (
          <>
            <h2>Connexion Étudiant</h2>
            <input
              type="text"
              placeholder="Nom"
              value={nom}
              onChange={(e) => setNom(e.target.value)}
            />
            <input
              type="password"
              placeholder="Mot de passe"
              value={mdp}
              onChange={(e) => setMdp(e.target.value)}
            />
            <button onClick={handleConnexion}>Se connecter</button>
            {error && <p className="error">{error}</p>}
          </>
        ) : (
          <>
            <h2>Bienvenue, {nom}</h2>
            <h3>Voici vos notes :</h3>
            <table>
              <thead>
                <tr>
                  <th>Matière</th>
                  <th>Note</th>
                </tr>
              </thead>
              <tbody>
                {notes.map((note, index) => (
                  <tr key={index}>
                    <td>{note.Matiere}</td>
                    <td>{note.Notes}</td>
                  </tr>
                ))}
              </tbody>
            </table>
          </>
        )}
      </div>
    </div>
  );
}

export default App;