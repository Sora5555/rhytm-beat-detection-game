<!DOCTYPE html>
<html lang="en">
<?php
 include("includes/header.php"); 

?>

<body>
   <?php include("includes/navigation.php"); ?>
    <div class="game-body" id="game-body">
        <h3 id="score">Press to start!</h3>
        <div class="circle initialCircle" id="startButton"></div>
    </div>
    
    <script type="module">
        import BeatBeat from "https://cdn.skypack.dev/beat-beat-js";
        let continueScore = false;
        let score = 0;
        const audioContext = new AudioContext();
        const sound = new BeatBeat(audioContext, "../public/<?php echo $songParam->song_name?>");
        let scoreElem = document.getElementById("score");
        let gameBody = document.getElementById("game-body").getBoundingClientRect();
        let songDuration = 0;

        const createCircle = () => {
            let CircleElem = document.createElement("div")
            let viewportWidth = gameBody.width;
            let viewportHeight = gameBody.height;
            console.log(viewportHeight, viewportWidth, window.innerHeight, window.innerWidth);
            
            let anotherCircle = document.querySelector(".circle");
            let positionX =  Math.floor(Math.random() * (viewportWidth - 100));
            let positionY =  Math.floor(Math.random() * (viewportHeight - 100));
            CircleElem.classList.add("animate", "circle");
            CircleElem.setAttribute("style", `position:absolute;top:${positionY}px;left:${positionX}px`);
            CircleElem.addEventListener("animationend", (event) => {
            score--;
            CircleElem.remove();
            scoreElem.innerHTML = score;
        })
            document.getElementById("game-body").appendChild(CircleElem);
            
        }

        const submitScore = () => {
            let form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "../router/router.php");
            form.setAttribute("style", `position:absolute;`);
            form.setAttribute('id', "formScore");

            let inputScore = document.createElement("input");
            inputScore.setAttribute("name", "score");
            inputScore.setAttribute("type", "hidden");
            inputScore.setAttribute("value", score);
            
            let inputRoute = document.createElement("input");
            inputRoute.setAttribute("name", "route");
            inputRoute.setAttribute("type", "hidden");
            inputRoute.setAttribute("value", "gameScore");
            
            let inputUserId = document.createElement("input");
            inputUserId.setAttribute("name", "user_id");
            inputUserId.setAttribute("type", "hidden");
            inputUserId.setAttribute("value", "<?php echo $_SESSION["id"]?>");
            
            let inputSongId = document.createElement("input");
            inputSongId.setAttribute("name", "song_id");
            inputSongId.setAttribute("type", "hidden");
            inputSongId.setAttribute("value", "<?php echo $_GET["id"]?>");


            form.append(inputScore, inputRoute, inputUserId, inputSongId);
            document.body.appendChild(form);
            let formElem = document.getElementById("formScore");
            formElem.submit();
            formElem.remove();
            
        }
        const notifySongEnd = () => {
            submitScore();
        }
        let startButton = document.getElementById("startButton");
        startButton.addEventListener("click", async function startGameOnce(e) {
            await audioContext.resume();
            await sound.load();
            sound.play(() => {
                
                createCircle();
            });
            songDuration = sound.duration;
            setTimeout(notifySongEnd, sound.buffer.duration * 1000)
            startButton.removeEventListener("click", startGameOnce);
        })
        document.addEventListener("click", (e) => {
            const target = e.target.closest(".circle"); // Or any other selector.
            if(target){
                score++
                scoreElem.innerHTML = score;
                continueScore = true;
                target.remove()
                    // Do something with `target`.
            }
            if(continueScore){
                console.log(score);
                continueScore = false;
            } else {
                console.log("Game Over");
            }
        })
        let animated = document.querySelector(".circle");
        
    </script>
</body>
</html>