<?php
namespace BioPage;

class DiscordProfileFetcher {
    public static function fetchProfile($discordId) {
        // Simulating fetching Discord profile data
        $discordProfile = array(
            "username" => "@t3zzt",
            "avatar_url" => "https://cdn.discordapp.com/attachments/1208317927623888980/1251664458967810139/DONNIE_PFP.webp?ex=666f66dd&is=666e155d&hm=ad7748e9cd9b821349fd2511c645eb65186889371b8b96dbb8480c001f3df4dc&",
            // Add more profile data as needed
        );
        return $discordProfile;
    }
}

$discordId = "929818234146930808";
$discordProfile = null;

if (isset($_GET['show_profile'])) {
    $discordProfile = DiscordProfileFetcher::fetchProfile($discordId);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TezT Bio</title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="assets/img/logot.png" type="image/svg+xml">
    <style>
        /* CSS Styles */
        body {
            font-family: sans-serif;
            color: #ffffff;
            margin: 0;
            padding: 0;
            background-image: url('https://r2-bios.e-z.host/aef2a9af-85f7-40ce-8f18-411df779c6a5/l4y59oxfvw.gif'); /* Replace with your image link */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden; /* Hide scrollbars */
        }
        .container {
            max-width: 800px;
            padding: 20px;
            text-align: center;
            border: 2px solid #ffffff;
            border-radius: 10px;
            position: relative;
            opacity: 0; /* Initially hidden */
        }
        .container.show {
            opacity: 1; /* Make visible */
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black overlay */
            backdrop-filter: blur(10px); /* Apply blur effect */
            border-radius: 10px;
            z-index: -1; /* Put the overlay behind the content */
        }
        .profile {
            margin-bottom: 20px;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .clickable-text {
            color: white;
            font-size: 42px;
            cursor: default;
            text-decoration: none;
            transition: color 0.3s;
        }
        .clickable-style {
            color: grey;
            font-size: 18px;
            cursor: default;
            text-decoration: none;
            transition: color 0.3s;
        }
        .clickable-text:hover {
            color: grey;
            cursor: pointer;
        }
        /* Add your own custom CSS styles here */
        .audio-player {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .audio-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .audio-progress {
            flex-grow: 1;
            background-color: rgba(255, 255, 255, 0.3);
            height: 5px;
            border-radius: 2.5px;
            margin: 0 10px;
            position: relative;
        }
        .audio-progress-bar {
            background-color: #ffffff;
            height: 100%;
            border-radius: 2.5px;
            width: 0%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .audio-time {
            color: #ffffff;
            font-size: 12px;
        }
        .custom-audio-controls button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: white;
            font-size: 24px;
            margin: 0 10px;
        }
    </style>
</head>
<body>
<?php if ($discordProfile) { ?>
    <div class="container">
        <div class="overlay"></div> <!-- Semi-transparent black overlay -->
        <div class="profile">
            <h1>TezzzT</h1>
            <h2><?php echo $discordProfile['username']; ?></h2>
            <img src="<?php echo $discordProfile['avatar_url']; ?>" alt="Profile Image" class="profile-image">
        </div>
        <div class="audio-player">
            <audio id="audio" style="display: none;">
                <source src="audio/DarkShadowBlunts.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            <div class="custom-audio-controls">
                <button id="play-button" onclick="toggleAudio()">▶</button>
            </div>
        </div>
        <div class="audio-controls">
            <span class="audio-time" id="current-time">0:00</span>
            <div class="audio-progress">
                <div class="audio-progress-bar"></div>
            </div>
            <span class="audio-time" id="duration">0:00</span>
        </div>
        <a href="https://discord.gg/TezT">
            <svg role="img" class="h-7 w-7" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="55" height="55" style="filter: drop-shadow(rgb(255, 255, 255) 0px 0px 3.5px); fill: rgb(255, 255, 255);">
                <path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"></path>
            </svg>
        </a>
        <a href="https://TezT.cloud">
            <img src="https://cdn.discordapp.com/attachments/1148294198492139732/1238505523628998767/logo2.png?ex=663f87a7&is=663e3627&hm=655b1dcfcd6059dabfa2186cb7e14d40eab54c03f11808805636b86af7b1154a&" alt="TezT
            " style="filter: drop-shadow(rgb(255, 255, 255) 0px 0px 5.5px)" width="50" height="50">
        </a>
    </div>
<?php } else { ?>
    <div class="overlay"></div> <!-- Semi-transparent black overlay -->
    <span onclick="showProfile()" class="clickable-text">Click Here</span>
    <script>
        function showProfile() {
            window.location.href = "?show_profile=true";
        }
    </script>
<?php } ?>

<script>
    // Add 'show' class to trigger fade-in effect after page loads
    window.addEventListener('load', function() {
        var container = document.querySelector('.container');
        var opacity = 0.1; // Initial opacity
        var interval = setInterval(function() {
            if (opacity >= 1) {
                clearInterval(interval); // Stop increasing opacity when it reaches 1
            } else {
                container.style.opacity = opacity; // Set opacity
                opacity += 0.1; // Increment opacity by 0.1
            }
        }, 500 / 10); // 500 ms divided by 10 steps (0.1 increments)
    });
</script>

<script>
    // Add 'show' class to trigger fade-in effect after page loads
    window.addEventListener('load', function() {
        var container = document.querySelector('.clickable-text');
        var opacity = 0.1; // Initial opacity
        var interval = setInterval(function() {
            if (opacity >= 1) {
                clearInterval(interval); // Stop increasing opacity when it reaches 1
            } else {
                container.style.opacity = opacity; // Set opacity
                opacity += 0.1; // Increment opacity by 0.1
            }
        }, 500 / 10); // 500 ms divided by 10 steps (0.1 increments)
    });
</script>
<script>
    // Custom audio player functionality
    var audio = document.getElementById('audio');
    var progressBar = document.querySelector('.audio-progress-bar');
    var currentTime = document.getElementById('current-time');
    var duration = document.getElementById('duration');
    var playButton = document.getElementById('play-button');
    var stopButton = document.getElementById('stop-button');

    // Update current time and duration
    audio.addEventListener('loadedmetadata', function() {
        duration.textContent = formatTime(audio.duration);
    });

    // Update progress bar as audio plays
    audio.addEventListener('timeupdate', function() {
        var progress = (audio.currentTime / audio.duration) * 100;
        progressBar.style.width = progress + '%';
        currentTime.textContent = formatTime(audio.currentTime);
    });
    

    // Format time in mm:ss format
    function formatTime(time) {
        var minutes = Math.floor(time / 60);
        var seconds = Math.floor(time % 60);
        if (seconds < 10) {
            seconds = '0' + seconds;
        }
        return minutes + ':' + seconds;
    }

    // Toggle play/pause functionality
    function toggleAudio() {
        if (audio.paused) {
            audio.play();
            playButton.textContent = '⏸';
        } else {
            audio.pause();
            playButton.textContent = '▶';
        }
    }

    // Stop audio playback
    function stopAudio() {
        audio.pause();
        audio.currentTime = 0;
        playButton.textContent = '▶';
    }
</script>
</body>
</html>
