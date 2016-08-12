<html>
    <head>
        <title>University Lecture Calendar</title>
        <link rel="stylesheet" href="Main.css">
        <link rel="icon" href="Basquiat Crown.png">
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
            <div class="Sub-Div">
                <h3>Year Three</h3>
                <select class="Odd-Even-Select List">
                    <option class="Odd" value="Odd" selected="selected">Odd Week</option>
                    <option class="Even" value="Even">Even Week</option>
                </select>
                <table class="Calendar-Table">
                    <tr>
                        <th class="Header Cell"></th>
                        <th class="Header Cell">Monday</th>
                        <th class="Header Cell">Tuesday</th>
                        <th class="Header Cell">Wednesday</th>
                        <th class="Header Cell">Thursday</th>
                        <th class="Header Cell">Friday</th>
                    </tr>
                    <tr>
                        <th class="Header Cell">9AM</th>
                        <td id="9Mo" class="Cell"></td>
                        <td id="9Tu" class="Cell"></td>
                        <td id="9We" class="Cell"></td>
                        <td id="9Th" class="Cell"></td>
                        <td id="9Fr" class="Cell"></td>
                    </tr>
                    <tr>
                        <th class="Header Cell">10AM</th>
                        <td id="10Mo" class="Cell"></td>
                        <td id="10Tu" class="Cell"></td>
                        <td id="10We" class="Cell"></td>
                        <td id="10Th" class="Cell"></td>
                        <td id="10Fr" class="Cell"></td>
                    </tr>
                    <tr>
                        <th class="Header Cell">11AM</th>
                        <td id="11Mo" class="Cell"></td>
                        <td id="11Tu" class="Cell"></td>
                        <td id="11We" class="Cell"></td>
                        <td id="11Th" class="Cell"></td>
                        <td id="11Fr" class="Cell"></td>
                    </tr>
                    <tr>
                        <th class="Header Cell">12PM</th>
                        <td id="12Mo" class="Cell"></td>
                        <td id="12Tu" class="Cell"></td>
                        <td id="12We" class="Cell"></td>
                        <td id="12Th" class="Cell"></td>
                        <td id="12Fr" class="Cell"></td>
                    </tr>
                    <tr>
                        <th class="Header Cell">1PM</th>
                        <td id="13Mo" class="Cell"></td>
                        <td id="13Tu" class="Cell"></td>
                        <td id="13We" class="Cell"></td>
                        <td id="13Th" class="Cell"></td>
                        <td id="13Fr" class="Cell"></td>
                    </tr>
                    <tr>
                        <th class="Header Cell">2PM</th>
                        <td id="14Mo" class="Cell"></td>
                        <td id="14Tu" class="Cell"></td>
                        <td id="14We" class="Cell"></td>
                        <td id="14Th" class="Cell"></td>
                        <td id="14Fr" class="Cell"></td>
                    </tr>
                    <tr>
                        <th class="Header Cell">3PM</th>
                        <td id="15Mo" class="Cell"></td>
                        <td id="15Tu" class="Cell"></td>
                        <td id="15We" class="Cell"></td>
                        <td id="15Th" class="Cell"></td>
                        <td id="15Fr" class="Cell"></td>
                    </tr>
                    <tr>
                        <th class="Header Cell">4PM</th>
                        <td id="16Mo" class="Cell"></td>
                        <td id="16Tu" class="Cell"></td>
                        <td id="16We" class="Cell"></td>
                        <td id="16Th" class="Cell"></td>
                        <td id="16Fr" class="Cell"></td>
                    </tr>
                    <tr>
                        <th class="Header Cell">5PM</th>
                        <td id="17Mo" class="Cell"></td>
                        <td id="17Tu" class="Cell"></td>
                        <td id="17We" class="Cell"></td>
                        <td id="17Th" class="Cell"></td>
                        <td id="17Fr" class="Cell"></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
