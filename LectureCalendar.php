<html>
    <head>
        <title>University Lecture Calendar</title>
        <link rel="stylesheet" href="Main.css">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="LectureCalendarScript.js"></script>
    </head>
    <body>
        <div class="Main-Div">
            <h1>University Lecture Calendar</h1>
            <div id="Back-Button-Div">
                <input type="button" class="Back Button" onclick="window.location = 'index.html';" value="Back to Main Page">
            </div>
            <br/>
            <div>
                <h3>Year Three</h3>
                <select class="Odd-Even-Select List">
                    <option value="Odd">Odd Week</option>
                    <option value="Even">Even Week</option>
                </select>
                <table class="Calendar-Table">
                    <tr class="Day-Row">
                        <th></th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                    </tr>
                    <tr class="9-Row">
                        <th class="Day-Row">9AM</th>
                        <td id="9Mo"></td>
                        <td id="9Tu"></td>
                        <td id="9We"></td>
                        <td id="9Th"></td>
                        <td id="9Fr"></td>
                    </tr>
                    <tr class="10-Row">
                        <th class="Day-Row">10AM</th>
                        <td id="10Mo"></td>
                        <td id="10Tu"></td>
                        <td id="10We"></td>
                        <td id="10Th"></td>
                        <td id="10Fr"></td>
                    </tr>
                    <tr class="11-Row">
                        <th class="Day-Row">11AM</th>
                        <td id="11Mo"></td>
                        <td id="11Tu"></td>
                        <td id="11We"></td>
                        <td id="11Th"></td>
                        <td id="11Fr"></td>
                    </tr>
                    <tr class="12-Row">
                        <th class="Day-Row">12PM</th>
                        <td id="12Mo"></td>
                        <td id="12Tu"></td>
                        <td id="12We"></td>
                        <td id="12Th"></td>
                        <td id="12Fr"></td>
                    </tr>
                    <tr class="13-Row">
                        <th class="Day-Row">1PM</th>
                        <td id="13Mo"></td>
                        <td id="13Tu"></td>
                        <td id="13We"></td>
                        <td id="13Th"></td>
                        <td id="13Fr"></td>
                    </tr>
                    <tr class="14-Row">
                        <th class="Day-Row">2PM</th>
                        <td id="14Mo"></td>
                        <td id="14Tu"></td>
                        <td id="14We"></td>
                        <td id="14Th"></td>
                        <td id="14Fr"></td>
                    </tr>
                    <tr class="15-Row">
                        <th class="Day-Row">3PM</th>
                        <td id="15Mo"></td>
                        <td id="15Tu"></td>
                        <td id="15We"></td>
                        <td id="15Th"></td>
                        <td id="15Fr"></td>
                    </tr>
                    <tr class="16-Row">
                        <th class="Day-Row">4PM</th>
                        <td id="16Mo"></td>
                        <td id="16Tu"></td>
                        <td id="16We"></td>
                        <td id="16Th"></td>
                        <td id="16Fr"></td>
                    </tr>
                    <tr class="17-Row">
                        <th class="Day-Row">5PM</th>
                        <td id="17Mo"></td>
                        <td id="17Tu"></td>
                        <td id="17We"></td>
                        <td id="17Th"></td>
                        <td id="17Fr"></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
