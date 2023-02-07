<?php

    //we need this the current date system to highlight the current day
    $currentMonth = date('n');
    $currentYear = date('Y');
    $currentDay = date('j');

    //this ternary operator we can check if the user click for prev or next button and if not we show the current set the current date
    $month = isset($_GET['month']) ? (int) $_GET['month'] : date("n");
    $year = isset($_GET['year']) ? (int) $_GET['year'] : date("Y");
    $day = date("j");

    // we calculate and check the date formate when user click next or prev btn
    $prev_month = ($month == 1) ? 12 : $month - 1;
    $prev_year = ($month == 1) ? $year - 1 : $year;
    $next_month = ($month == 12) ? 1 : $month + 1;
    $next_year = ($month == 12) ? $year + 1 : $year;
    
    // this cal_days_in_month function give us how many days in current Month
    $num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    
    // Getting first day of the month index 
    $first_day = date("w", mktime(0, 0, 0, $month, 1, $year));
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufgabe 02</title>

    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--fontawsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--my style-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <!--start calender-->
    <section id="calender" >
        <div class="calender-wrapper">

            
                <nav class="month-navigation-wrapper">
                    <a href="?nextBtn&month=<?php echo $prev_month . "&year=" . $prev_year;?>"  name="prevBtn"> <i class="fas fa-chevron-left"></i></a>
                    <span><?php echo date("F Y", mktime(0, 0, 0, $month, 1, $year)) ?></span>
                    <a href="?nextBtn&month=<?php echo $next_month . "&year=" . $next_year;?>" > <i class="fas fa-chevron-right"></i></a>
                </nav>
        

            <table class="calender-table" cellspacing="0" cellpadding="0">
                <thead>
                    <tr class="week">
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td class="prevMonthDays"></td>
                        <td class="prevMonthDays">28</td>
                        <td class="prevMonthDays">29</td>
                        <td class="prevMonthDays">30</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                    </tr> -->
                    <?php 
                        $diff=0;
                        echo "<tr>";
                        for ($i = 0; $i < $first_day; $i++) {
                            echo "<td class='prevMonthDays'></td>";
                            $diff++;
                        }

                        
                        for ($i = 1; $i <= $num_days; $i++) {
                    
                            if ($month == $currentMonth && $year == $currentYear && $i == $currentDay) {
                                echo "<td class='today'>" . $i . "</td>";
                            }
                            else {
                                echo "<td>" . $i . "</td>";
                            }
                            if (($i + $first_day) % 7 == 0) {
                                echo "<tr/>";
                            }
                        }

                    
                        
                    ?>
                    



                    <!-- <tr>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td class="today">28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                    </tr>
                
                    </tr> -->

                </tbody>
                
            </table>

        </div>
    </section>
    <!--end calender-->

</body>
</html>