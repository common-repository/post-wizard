<?php 

function animatedSVG() { ?>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                style="background: #f2f2f2; shape-rendering: auto;" width="50px" height="50px" viewBox="0 0 100 100"
                preserveAspectRatio="xMidYMid">
                <circle cx="84" cy="50" r="10" fill="#5839b6">
                    <animate attributeName="r" repeatCount="indefinite" dur="0.7352941176470588s" calcMode="spline"
                        keyTimes="0;1" values="10;0" keySplines="0 0.5 0.5 1" begin="0s"></animate>
                    <animate attributeName="fill" repeatCount="indefinite" dur="2.941176470588235s" calcMode="discrete"
                        keyTimes="0;0.25;0.5;0.75;1" values="#5839b6;#5839b6;#5839b6;#5839b6;#5839b6" begin="0s">
                    </animate>
                </circle>
                <circle cx="16" cy="50" r="10" fill="#5839b6">
                    <animate attributeName="r" repeatCount="indefinite" dur="2.941176470588235s" calcMode="spline"
                        keyTimes="0;0.25;0.5;0.75;1" values="0;0;10;10;10"
                        keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="0s"></animate>
                    <animate attributeName="cx" repeatCount="indefinite" dur="2.941176470588235s" calcMode="spline"
                        keyTimes="0;0.25;0.5;0.75;1" values="16;16;16;50;84"
                        keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="0s"></animate>
                </circle>
                <circle cx="50" cy="50" r="10" fill="#5839b6">
                    <animate attributeName="r" repeatCount="indefinite" dur="2.941176470588235s" calcMode="spline"
                        keyTimes="0;0.25;0.5;0.75;1" values="0;0;10;10;10"
                        keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.7352941176470588s">
                    </animate>
                    <animate attributeName="cx" repeatCount="indefinite" dur="2.941176470588235s" calcMode="spline"
                        keyTimes="0;0.25;0.5;0.75;1" values="16;16;16;50;84"
                        keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.7352941176470588s">
                    </animate>
                </circle>
                <circle cx="84" cy="50" r="10" fill="#5839b6">
                    <animate attributeName="r" repeatCount="indefinite" dur="2.941176470588235s" calcMode="spline"
                        keyTimes="0;0.25;0.5;0.75;1" values="0;0;10;10;10"
                        keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-1.4705882352941175s">
                    </animate>
                    <animate attributeName="cx" repeatCount="indefinite" dur="2.941176470588235s" calcMode="spline"
                        keyTimes="0;0.25;0.5;0.75;1" values="16;16;16;50;84"
                        keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-1.4705882352941175s">
                    </animate>
                </circle>
                <circle cx="16" cy="50" r="10" fill="#5839b6">
                    <animate attributeName="r" repeatCount="indefinite" dur="2.941176470588235s" calcMode="spline"
                        keyTimes="0;0.25;0.5;0.75;1" values="0;0;10;10;10"
                        keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-2.205882352941176s">
                    </animate>
                    <animate attributeName="cx" repeatCount="indefinite" dur="2.941176470588235s" calcMode="spline"
                        keyTimes="0;0.25;0.5;0.75;1" values="16;16;16;50;84"
                        keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-2.205882352941176s">
                    </animate>
                </circle>
            </svg>
<?php }

?>

<div id="post-wizard-popup">
    <form id="post-wizard-form" method="POST">
        <label for="post-title">Titel*:</label><br>
        <input type="text" id="post-title" name="post-title" maxlength="60" required><br>
        <label for="post-categories">Schlagwörter <em>(Einzene Worte mit einem Komma trennen)</em>:</label><br>
        <input type="text" id="post-categories" name="post-categories" placeholder="Beispiel, Beispiel"
            maxlength="60"><br><br>
        <input type="submit" value="Blog Beitrag generieren" class="wizard-button">
        <a href="https://lights-on.io" target="_blank" class="made-by-lightson">made with <span><svg id="Ebene_1"
                    data-name="Ebene 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 67 63">
                    <g id="Group-Copy">
                        <path id="Path-212"
                            d="M240.59,214.78c1.25-1,2.35-2.18,4.07-2.76,4.07-1.37,4.36-3.21,5.61-2.73s7.87,20,7.87,21.46.75,9.09,1.21,10.26,3.92,8.28,5.33,10.94c.08.16-1.91,1.27-4.48,1.72a63.45,63.45,0,0,1-6.93.51,26.46,26.46,0,0,0,9,1.57c3-.17,4.93-.7,5.05-.55.87,1.15,12.15,10,15.78,10.49,2.26.3-14.44,6-33.28,6.47-11.45.28-23-.35-33.51-8.24q14.17-4.29,18.23-10.25a91.48,91.48,0,0,0,4.62-10.95c.45-1.59,4.94-11.45,4.25-10.3-1.23,2.09-4.22,4.53-5,5.23s2.16-4,2.37-5.23c.64-3.76,2-4.84,1.19-8.47-.16-.71-.36-1.69-.58-2.93a41.48,41.48,0,0,0,3.92-2.56c-.5.2-1.49.24-2.35.47a12.56,12.56,0,0,0-4.41,1.95,8,8,0,0,1-4,1.53Q238.88,216.11,240.59,214.78Z"
                            transform="translate(-216.28 -209.21)" style="fill: #5839b6;fill-rule: evenodd" />
                    </g>
                </svg></span> by <strong>LightsOn</strong></a>
    </form>

    <div class="loading-container">
        <div class="loading">
            <div>Text wird generiert</div>
            <?php animatedSVG() ?>
        </div>
        <div class="extra-info">
            Es kann bis zu einer Minute dauern.
        </div>
    </div>

    <form id="create-post" method="POST" enctype="multipart/form-data" name="create-postwizard-post">
        <input type="text" id="final-title" name="final-title">
        <textarea id="api-answer" name="api-answer"></textarea>
        <div id="postwizard-loading-message">
            <div class="loading">
                <div>Bild wird generiert</div>
                <?php animatedSVG() ?>
            </div>
            <div class="extra-info">
                Es dauert nur noch wenige Sekunden. Dann ist der Beitrag fertig.
            </div>
        </div>
        <!-- <div class="postwizard-image--container">
            <img src="" alt="" id="postwizard-image">
        </div> -->
        <input type="submit" value="Blog Beitrag erstellen" id="create-post-submit" class="wizard-button">
    </form>

    <div class="pw-error-message">
        <span>🙈 Ups, es ist leider etwas schief gegangen.</span><br><br>Versuche es bitte nochmal, oder nimm einen
        anderen Titel bzw. andere Schlagwörter.
    </div>
</div>