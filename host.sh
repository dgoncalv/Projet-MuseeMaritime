cd app
echo "Vérification des dépendances..."
npm i -g @angular/cli
npm install
echo "Vérification terminées!"
echo "Lancement du serveur..."
ng serve --host 0.0.0.0 --poll=2000