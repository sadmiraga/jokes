Na spletnoj strani se nalazi 5 glavnih stavkov.

1. HOME 
  -Če je uporabnik prijavljen na home stranici vidi vse šale uporabnika kirih prati.
  -Tudi lahko Like al pa Unlike šalo odvidno od tega ce je prej like.
  -tudi za vsako foro ispisuje koliko ima lajkov.
  -iznad vsake fore se nalazi profilna slika uporabnika kateri je objavil šalo.
  -Ko kliknes na sliko uporabnika redirecta te na njegov profil in tamo lahko vidis njeghovo sliko,
  lahko ga zapratite al pa odpratite. Tudi se vidijo vse njegove šale sa opcijama like i ispisom števila
  lajkov
  
  
2. CATEGORIES
  Na Categories page lahko pridejo vsaj uporabniki in guesti.
  Na categories pageu se ispisuju vse kategorije šali.
    Klikon na kategoriju se redirecta na stran kje lahko vidite vse šale iz te kategorije.
    Na toj strani (categoryJokes.php) lahko Like al pa unlike in pridete na profil uporabnika kateri 
    je objavil šalo (če je prijavljen), če uporabnik ni prijavljen ko klikne na like-unlike in profilno
    sliko redirecta ga na login.php

3. ADD JOKE
    Ta opcija sploh ni vidljiva ce uporabnik ni prijavljen.
    Lahko upises text šale in izberete kategorijo šale.
    Ko se šala doda po defaultu ostaje na approve='no'.
    In ni vidljiva nikomu vse dok admin al pa head admin ne approve al pa decline Joke(myProfile-approveJokes)
    
4.MY PROFILE 
      To sploh ni vidljivo ce uporabnik ni prijavljen.
 
      USER:
          Prikaze mu njegovo profilno sliko katero lahko spremeni.
          Pokaze mu vse njegove šale katere lahko uredi al pa zbrise šalo.
      ADMIN: 
          Adminu tudi prikaze vse kot navadnom uporabniku 
          + Ima admin Panel kateri sadrzi samo APPROVE JOKES
              APPROVE JOKES:
                  Na toj strani se ispisu vse šale katere nisu odobrene.
                  admin lahko odobri al pa odbije šalo
                  če je odobri v bazi se premeni appove in je šala vidljiva vsima 
                  če je odbije ( decline) šala se izbrise iz baze.
      HEAD ADMIN :
          head admin ima vse kot navadni admin 
          + ADD CATEGORY
              Tule lahko doda novo kategorijo šali
          +MANAGE USERS
              Tule mu ispise koliko ima navadnih userja, adminov in head adminjev.
              Tudi mu ispise Vse usere in in lahko spremeni userType (user,admin,headAdmin)
              
 5.LOGOUT
    tule odjavi uporabnika 
    to sploh ni vidljivo ce uporabnik ni prijavljen 
    
  SLIKA ER MODELA 
  
  ![slika](https://github.com/sadmiraga/jokes/slika_baze_podataka.png)

https://github.com/sadmiraga/jokes/blob/master/slika%20baze%20podataka.png
         
        
