var userChoice = prompt("Do you choose rock, paper or scissors?");

var computerChoice = Math.random();

if (computerChoice < 0.34) {
	computerChoice = "rock";
}
else if(computerChoice <= 0.67) {
	computerChoice = "paper";
}
else {
	computerChoice = "scissors";
}

console.log("User: " + userChoice);
console.log("Computer: " + computerChoice);

var compare = function(choice1, choice2){
    if (choice1 ===choice2){
        return "The result is a tie!";
    }
    
    if (choice1==="rock"){
        if (choice2==="scissors"){
            return "rock wins";
        }
        else {
            return "paper wins";
    }
        
    if (choice1==="paper"){
            if(choice2==="rock"){
                return "paper wins";
            }
            else{
                return "scissors wins";
            }
        }
    }    if (choice1==="scissors"){
            if(choice2==="rock"){
                return "rock wins";
            }
            else{
                return "scissors wins";
            }
        }
}
compare (userChoice, computerChoice);
/*new script*/

var text= "This is Godstime. He likes playing basketball, playing computer games and coding. Godstime is 17 years old. He goes to Pipers Hill College. Godstime is a fun guy.";
var myName="Godstime";
var hits=[];

for(i=0;i<text.length;i++){
    if(text[i]=="G"){
        for(j=i;j<(myName.length+i);j++){
            hits.push(text[j]);
        }   
    }
}

if(hits.length===0){
    console.log("Your name wasn't found!");
}
else{
    console.log(hits);
}
/*new script*/
 var answer= prompt("What is 1+1?");
    switch (answer) {
        case "2":
            console.log("Correct!");
            break;
    default:
        console.log("Incorrect!");
        break;	
 }

	/*new script*/
	 alert("Now I'm going to tell you the names and also about some of the dimensions in the portal. There's Legoworld which is a place where everything is made of Lego. It's exactly like Earth except made of Lego. Next is Sweet Street. In this dimension instead of money they use paper and almost everything are made from sweets and there are only sweets and chocolate in Sweet Street. Next is DragonBallZ land. Here you can join the Super Saiyans and battle against evil. Then there's DC Universe. Here you can see Superman and the other DC superheroes such as Batman and the Green Lantern. The next dimension is Marvel Universe. In Marvel Universe you can talk to the Fantastic Four, The Avengers and many other Marvel superheroes. That's a few there are lots more! Now out of my teammates there are two groups 'The Supersixes' and 'The Fifteenics'.");
	 alert("There are quite a lot of super villains always lurking around, and when they cause trouble we send them back to jail. These are some of them: Magneto, Mageneta, Demongirl, Demonboy, Shootella, Solar Boom, Attackelater, Nova Flame, Ice Slicer, Fire Slicer, Water Slicer, Earth Slicer, Dark Slicer, Light Slicer, Magic Slicer, Lightning Slicer, Air Slicer, Cananomine, Underminer, Draganada, Solar Howl, Night scraper, Elemental Slicer, Sir Cash-a-lot, Battle Death, Power De-freezer, the Dark Phoenix, Morphaloon, Mirage Maker, Goldium, Silverium, Bronzium, Ironium, Metalite, Stalagmite, Static Wind, Chronolocaze, Excalibur, Monotropolis, Ice Scene, Fire Scene, Water Scene, Night Scene, Light Scene, Earth Scene, Air Scene, Energy Scene, Numbner, Mandroid, Womanicdroid, Sonic Howl, Sonic Boom, Droideck, Droidecka, Illuminatrix, Elemental Ninja, and so many others.");
alert("Anyway many different enemies come to attack every now and then. ");
alert("There are a lot of super villains in many dimensions such as: ");
alert("Witch Land, Wizard Land, Retro Ville, Dimmsdale, Fantastic Land, Planetarium, Acmetropolis, Legoworld, Avatar Land, Sonic Land, Cartoon Land, Mutant Land, Sweet Street, Gang Street, Utopia, and so many others. They come to destroy the peace and tranquil that's there. But we come to bring it back!");

alert("These are my teammates in the Supersixes team:"); 
alert("Powerman (that's me); anything to do with elemental powers,"); 
alert("Powerwoman; has the same powers as me except a bit weaker, ");
alert("Electro; has any power to do with lightning, ");
alert("Electra; has any power to do with light, ");
alert("Star Catboy; has any power got to do with atomic energy and has laser vision,") ;
alert("Star Catgirl; has the same power as U.S.A Star Catboy. ");
/*alert("These are my teammates in the Fifteenics team: ");
alert("Flameman; has any power got to do with fire, ");
alert("Flamewoman; has the same power as Flameman but a bit weaker, ");
alert("Flameboy; has the same power as Flamewoman but a bit weaker, ");
alert("Flamegirl; has the same power as Flameboy but a bit weaker, ");
alert("Gymnasta Girl; has an unlimited elasticity and also laser vision, ");
alert("LightforceX; has the power to run at the speed of light and can control a bit of light, ");
alert("SpeedoX; has the power to control anything got to do with sound and air and can run at the speed of sound, ");
alert("Aquagirl; has the power to control anything got to do with water, ");
alert("Metollo; has the power to control anything hard, ");
alert("Shrinkara; can shrink down to any size and has laser vision, ");
alert("Doughnut Boy; can grow 10x his size and laser vision, ");
alert("Spikeboy; has the power to control anything sharp, ");
alert("Multiplier I; can duplicate, turn invisible, and has laser vision, ");
alert("Multiplier F; has the power of force fields, has laser vision and can duplicate, ");
alert("Shaparama; has the power to morph or shapeshift into anything.");*/

	var answer = prompt("Who would you like to pick as your superhero from the Supersixes team?").toLowerCase();
	
	switch (answer){
		case "powerman":
			console.log("You have selected " + answer + "!" + " Your power is anything to do with elemental powers.");
			break;
		case "powerwoman":
			console.log("You have selected " + answer + "!" + " Your power is anything to do with elemental powers.");
			break;
		case "electro":
			console.log("You have selected " + answer + "!" + " Your power is any power to do with lightning.");
			break;
		case "electra":
			console.log("You have selected " + answer + "!" + " Your power is any power to do with light.");
			break;
		case "star catboy":
			console.log("You have selected " + answer + "!" + " Your power is any power got to do with atomic energy and laser vision.");
			break;
		case "star catgirl":
			console.log("You have selected " + answer + "!" + " Your power is any power got to do with atomic energy and laser vision.");
			break;
			default:
			alert("You did not pick a superhero! Please pick again.");
			var answer = prompt("Who would you like to pick as your superhero from the Supersixes team?").toLowerCase();
			break;
	}