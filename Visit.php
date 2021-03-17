<?php

session_start(); 

    include "Navbar.php";


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Visit</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
  
  </head>

  <body>
    

    <div class="imgVisit">
      <img src="visit.png" alt="" />
    </div>

    <div class="apollo">
      <img src="ImageVisit/Apollo.jpg" alt="" />
      <p>
        We look forward to welcoming you to the Art Deco splendour of the Apollo Victoria Theatre, which is owned
        and operated by the Ambassador Theatre Group (ATG). The magnificent, Grade II* Listed venue has been “a
        giant London landmark for nine decades” (The Daily Telegraph) and home to WICKED since its London premiere
        in 2006. All of the 2,328 seats in the stunningly restored auditorium are located on just two levels
        (Stalls and Circle).
      </p>
    </div>

    <div class="victoria">
      <h2>Visiting Victoria</h2>
      <img src="ImageVisit/Visit_Victoria.jpg" alt="" />
      <p>
        Victoria sits at the heart of central London, between Westminster and Belgravia. Home to many of the
        capital’s most popular tourist attractions, prestigious hotels, restaurants, retail outlets and theatres,
        the district is completing a multi-billion-pound regeneration, transforming the area into a vibrant
        business, residential, food, shopping and cultural district for the 21st century. Various quintessential
        London visitor landmarks, experiences and attractions are just minutes from WICKED, including the
        centuries-old tradition of witnessing the ‘Changing The Guard’ ceremony outside Buckingham Palace. The
        Summer opening of the State Rooms at Buckingham Palace, the Royal Mews, the Queen’s Gallery, Westminster
        Cathedral (including the Tower Viewing Gallery), the Palace of Westminster (including the Houses of
        Parliament and Big Ben) and the UNESCO World Heritage site of Westminster Abbey are all within walking
        distance of the theatre.
      </p>
    </div>

    <div class="officialPartners">
      <h2>Official partners</h2>
    </div>

    <div class="flexContainer">
      <div class="theRubens">
        <img src="ImageVisit/The_Rubens.jpg" alt="" />
        <h3>The Rubens at the palace</h3>
        <p>
          Located directly opposite Buckingham Palace’s Royal Mews, this historic, five star Red Carnation hotel
          invites guests to stay in elegantly appointed Rooms and Suites, enjoy a ‘Royal Afternoon Tea’ in the
          Palace Lounge, cocktails and live music in the New York Bar and to savour delicious cuisine in the
          English Grill.
        </p>
      </div>

      <div class="balans">
        <img src="ImageVisit/Balans.jpg" alt="" />
        <h3>Balans restaurants</h3>
        <p>
          Balans Soho Society is located at the Roof Garden Level of Cardinal Place, which is a 5-minute walk from
          the theatre. Enjoy an exclusive pre-theatre meal and ticket package.
        </p>
      </div>
    </div>

    <?php include "footer.php";  ?>
  </body>
</html>
