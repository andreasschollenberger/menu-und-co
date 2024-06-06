<template>
    <main>
        <div class="card">
            <div class="menucard">
                <div class="m-img">
                    <div class="img-back">
                        <img src="/public/Assets/img/veganer-burger.png" alt="">
                    </div>
                </div>

                <div class="container">
                    <div class="tag-container">
                        <div class="titel">Veganer Burger</div>
                        <div class="kategorie">Kategorie: Hauptgericht</div>
                        <div class="herkunft">Herkunft: Amerika</div>
                        <div class="vegi">Vegi: Ja</div>
                        <div class="autor">Autor: Max Mustermann</div>
                    </div>

                    <div class="n-container">
                        <div class="nährwert">
                            <h3>Nährwertangaben: (pro Portion)</h3>
                            <ul>
                                <li>Kalorien: 380 kcal</li>
                                <li>Kohlenhydrate: 45g</li>
                                <li>Protein: 25g</li>
                                <li>Fett: 10g</li>
                                <li>Ballaststoffe: 5g</li>
                            </ul>
                
                            <h3>Vitamingehalt: (pro Portion)</h3>
                            <ul>
                                <li>Vitamin A: 3500 IE</li>
                                <li>Vitamin C: 30 mg</li>
                                <li>Kalzium: 100 mg</li>
                                <li>Eisen: 3 mg</li>
                            </ul>
                        </div>

                    </div>


                </div>
                
            </div>

            <div class="z-container">
                    <h3>Zutaten:</h3>
                    <div>250g Reisnudeln</div>
                    <div>200g Hühnerbrust, in Streifen geschnitten</div>
                    <div>100g Garnelen, geschält</div>
                    <div>1 Zwiebel, gehackt</div>
                    <div>Knoblauchzehen, gehackt</div>
                    <div>1 Karotte, in dünnen Streifen</div>
                    <div>1 Paprika, in dünnen Streifen</div>
                    <div>100g Kohl, gehackt</div>
                    <div>2 EL Sojasauce</div>
                    <div>2 EL Oystersauce</div>
                    <div>2 EL Sesamöl</div>
                    <div>Salz und Pfeffer nach Geschmack</div>
                    <div>Frühlingszwiebeln und Koriander zum Garnieren</div>
                </div>

            <div class="zubereitung">
                <h3>Zubereitung:</h3>
                <ol>
                    <li>Die Reisnudeln nach Packungsanweisung kochen, abgießen und beiseite stellen.</li>
                    <li>In einer Pfanne oder einem Wok das Sesamöl erhitzen. Zwiebeln und Knoblauch darin anbraten, bis sie duften.</li>
                    <li>Füge die Hühnerbruststreifen hinzu und brate sie an, bis sie goldbraun sind.</li>
                    <li>Garnelen dazugeben und kurz mitbraten, bis sie rosa werden.</li>
                    <li>Karotten, Paprika und Kohl hinzufügen und unter ständigem Rühren garen, bis das Gemüse weich ist.</li>
                    <li>Die gekochten Reisnudeln in die Pfanne geben und gut vermischen.</li>
                    <li>Sojasauce und Oystersauce über die Nudeln gießen und alles gut vermengen. Achte darauf, dass die Nudeln gleichmäßig mit den Saucen bedeckt sind.</li>
                    <li>Mit Salz und Pfeffer abschmecken und gegebenenfalls nachwürzen.</li>
                    <li>Das Pancit auf Tellern anrichten und mit frisch geschnittenen Frühlingszwiebeln und Korianderblättern garnieren.</li>
                    <li>Heiß servieren und genießen!</li>
                </ol>
            </div>

            <div class="a-container">
                <h3> Allergiker Informationen</h3>
                <div>Das Pancit-Rezept enthält verschiedene Zutaten wie Reisnudeln, Hühnerbrust, 
                    Garnelen und Gemüse wie Karotten, Paprika und Kohl. 
                    Es gibt jedoch einige potenzielle Allergene in diesem Rezept, 
                    daher ist es möglicherweise nicht für alle Allergiker geeignet. 
                    Hier sind die möglichen Allergene:</div><br>
                <ol>
                    <li>Gluten: Reisnudeln enthalten in der Regel kein Gluten, aber es ist wichtig, die Produktverpackung zu überprüfen, um sicherzustellen, dass sie glutenfrei sind. Manche Sojasaucen können ebenfalls Gluten enthalten, also wähle glutenfreie Sojasauce, falls nötig.</li>
                    <li>Meeresfrüchteallergie: Da das Rezept Garnelen enthält, sollten Personen mit einer Meeresfrüchteallergie diese Zutat ersetzen oder das Gericht entsprechend anpassen.</li>
                    <li>Sojaallergie: Einige Personen haben eine Sojaallergie, daher ist es wichtig sicherzustellen, dass die verwendete Sojasauce für sie geeignet ist.</li>
                    <li>Nussallergie: Das Sesamöl kann bei Personen mit einer Nussallergie problematisch sein, da Sesam zu den Nüssen zählt. In diesem Fall sollte ein anderes Öl verwendet werden.</li>
                    <li>Knoblauch- und Zwiebelallergie: Einige Personen haben auch Allergien gegen Knoblauch und Zwiebeln. In diesem Fall können diese Zutaten weggelassen oder durch andere Gewürze ersetzt werden.</li>
                </ol>
            </div>

        </div>

    </main>


</template>


<style scoped>

/* Halb-transparenter hintergrund */
main {
    display: flex;
    justify-content: center;
    max-width: 90%;
    margin: auto;
    border-radius: 30px;
    background-color: rgba(222, 220, 220, 0.81);
    padding: 70px 50px 70px 50px;
}


/* grauer container */
.card {
    width: 90%;
    background-color: rgba(179, 187, 195, 1);
    border-top-left-radius: 150px;
    border-bottom-right-radius: 150px; 
    padding-top: 50px;
    padding-left: 20px; 
}

/* img, titel und kategoriene */
.menucard {
    display: flex;
    margin-top: 50px;
    margin-left: 50px;
    margin-right: 200px;
}

.m-img {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0 50px 0 27px;
}

.img-back {
    width: 700px;
    height: 600px;
    border-radius: 25px;
    background-color: rgb(95, 68, 10);
    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    display: flex;
    flex-direction: column;
}

.img-back img {
    width: 500px;
    height: 400px;
    aspect-ratio: 16/9;
    object-fit: cover;
    margin: 0 0 0 27px;
    border-radius: 25px;
}

.tag-contaner {
    display: flex;
    flex-direction: column;
}


.n-container {
    display: flex;
    flex-direction: column;
}

.nährwert h3 {
    font-size: 16px;
}  

.nährwert li {
    font-size: 15px;
}

.titel {
    font-size: 45px;
    margin-bottom: 15px;
}

.kategorie,
.herkunft,
.vegi,
.autor {
    font-size: 24px;
}

.z-container {
    margin: 50px 0px 0px 100px;
}

.z-container h3 {
    font-size: 36px;
}

.z-container div {
    font-size: 27px;  
}

.zubereitung {
    margin: 50px 0px 0px 100px;
    width: 80%;
    display: flex;
    flex-direction: column;
}

.zubereitung h3 {
    font-size: 36px;
}

.zubereitung li {
    font-size: 27px;
} 

.a-container {
    margin: 50px 0px 0px 100px;
    width: 80%;
    padding-bottom: 80px;
}

</style>