USE adlister_db;

-- TRUNCATE categories;

INSERT INTO categories(type)

VALUES  ('accordion'),
        ('brass'),
        ('guitar'),
        ('harmonica'),
        ('percussion'),
        ('piano/keys'),
        ('string'),
        ('woodwind'),
        ('amplifiers/gear'),
        ('other');
        ('amplifier/gear');

-- TRUNCATE users;

INSERT INTO users(name, email, password, phone)

VALUES  ('Josh', 'josh@example.com', '$2y$10$lAn86TmNViFkpqEAZtav2uFADg6tTWd1y0lQpsDcImMqTK7m3hXvC', 1112223333),
        ('Rachel', 'rachel@example.com', '$2y$10$H58g1sNOZdSEuEGS5h7TF.ykS6n.ziISwjnoba2LOGr2jlPY.MZ6y', 2223334444);

-- TRUNCATE listings;

INSERT INTO listings(title, date_posted, category_id, user_id, brand, year, item_condition, price, image_url, description)

VALUES  ('1963 Jaguar', '2015-08-11', 3, 1, 'Fender', 1963, 'Excellent', 2995.00, '/img/1.png',
            'This guitar was purchased from the original owner who was 
            in his late 60\'s.  He indicated  that he purchased this 
            guitar brand new in the mid-60s.  At some point in the mid 
            to late 70s he told me that he refinished the guitar and 
            changed the color from a RED to white.  He also played it 
            a lot and in doing so it had quite a few scratches, dents 
            and dings.  Two of the tuning pegs were broken; however, 
            they still worked and properly tuned the guitar.  The 
            electronics were scratchy and needed to be cleaned as well.  
            It was 99.999% original with the exception of the headstock 
            LOGO which was missing.  I wanted to bring this guitar back 
            to its original color which was determined to be Dakota Red 
            by the guys at Chicago Fretworks.  They completely refinished 
            this guitar, cleaned the electronics, installed new period 
            correct tuners and repainted it the original color which was 
            Dakota Red, installed a new Headstock LOGO, cleaned the 
            fretboard, and installed new strings.  This cost me over $700; 
            however, this guitar sounds awesome and plays like butter!!! 
            I also have the receipt for the work done on this guitar.'
        ),
        ('CONN 12M BARI SAX BARITONE SAXOPHONE', '2015-08-11', 8, 2, 'Conn', 1967, 'Refurbished', 2950.00, '/img/2.png',
            'The restoration was done by a respected local craftsman 
            with over 40 years experience in woodwind and brass instrument 
            restorations and repairs. The shop’s woodwind specialist used 
            to work at the King Instrument Co. factory in Eastlake, Ohio 
            and does impeccable work.  I have personally used this company 
            for over 10 years for my adult band members and myself.  
            Everyone has always been impressed with their work.'
        ),
        ('Hammond B3 organ with leslie cabinet', '2015-08-11', 6, 1, 'Hammond', 1965, 'Very Good', 12500.00, '/img/3.png',
            'For sale a 1965 Hammond Organ B3 serial number 95393 with 
            foot pedals and a 1965 model 122 Leslie speaker system number 
            27003. Both are in excellent physical condition except for a 
            few minor scratches dings and dents. See photos. The cabinet’s 
            structural integrity is excellent – no broken glue joints or 
            loose parts. The finish is in excellent condition; no sun fading,
            stains, discolorations or burn marks.   
            The B3 and Leslie have been in a smoke free private professional 
            studio for the past seventeen years and the B3 was only 
            occasionally played. Electronics are in excellent condition 
            having been professionally refurbished following purchase by 
            owner. Mechanical condition and functionality of all drawbars, 
            switches, keyboards, knobs, rotating Leslie parts, speakers etc. 
            is excellent. Audio is loud and clear with no distortion.   
            Original paperwork, warranty cards and original 1965 purchase 
            agreement included along with all original Hammond documentation 
            and user guides. Asking price is $12,500.00. for B3 and Leslie.'
        ),
        ('1968 vintage sunn 100s guitar amp head', '2015-08-12', 9, 2, 'Sunn', 1968, 'Good', 1500.00, '/img/4.png', 
            'Very Rare vintage sunn re tubed and gone though by amp tech, 
            100,with tremolo and reverb options .... tone just like they 
            had in the sixties ...or if you\'re into stoner rock, its 
            what the bands are using now ! Great vintage tone at a great 
            price..!'
        ),
        ('Thumb piano - Mahogany Kalimba with resonance box', '2015-08-12', 10, 1, 'Marek Bolf', 2015, 'New', 148.00, '/img/5.png',
            'Before your eyes just opens a magical world of musical 
            instrument Kalimba, whose origin dates back to the far-off 
            Africa. 
            Compared to the original form are my Kalimbas reshaped 
            and adapted in material, shape and sound. 
            Playing technique on this instrument is not at all difficult. 
            Just hold the instrument with both hands, and pluck the keys 
            with alternating thumbs
            Kalimbas are mostly tuned in pentatonic tuning which fits 
            non-musicians to get the musical experience through their 
            own hands and allows beginners look into the world of tones, 
            music, harmony and inner peace. Diatonic tuning is appropriate 
            for more experienced players.
            It is possible to change the type of wood, the size of 
            kalimba, using resonant desk or box as well as change the 
            instrument tuning.'
        ),
        ('M. HOHNER THE SUPER CHROMONICA CHROMATIC HARMONICA', '2015-08-12', 4, 2, 'Hohner', null, 'Good', 19.63, '/img/6.png',
            'VERY NICE VINTAGE HOHNER HARMONICA. SOUNDS GREAT!!!'
        ),
        ('Ethnic Romanian Stroh Violin and Bow, Fiddle, Brass', '2015-08-12', 7, 1, 'Dorel Codoban', null, 'Very Good', 450.00, '/img/7.png',
            'Ethnic Romanian Stroh Violin and Bow, Fiddle, Brass
            Romanian Bihor area horn violin (Vioara cu goarna RO) 
            or Stroh (Stroviols)
            Made by the late and notourious fiddel maker Dorel Codoban 
            (1944-2012) from Rosia, County of Bihor, Transylvania, Romania
            In very good shape.'
        ),
        ('C&C Drum Company 12th and Vine 4PC Big Beat Set / Natural', '2015-08-12', 5, 2, 'C&C', 2015, 'New', 5139.00, '/img/8.png',
            'New C&C Drum Company 12th and Vine series 3 Piece Drum Set 
            in Natural Stain finish 
            Features:
            Inspired by the great American drums from the 50s, 60s and 70s, 
            the 12th & Vine series features a 5 ply shell with a 1/8” Poplar 
            Core, 7 Ply Maple Reinforcement Rings and C&C\'s Vintage 
            Round-Over bearing edge. The Poplar core warms up the shell 
            and absorbs unwanted over tones while providing a sound equally 
            suitable for live and studio use.
            Art Deco lug 
            Stick Saver Hoops
            Vintage Style Spurs 
            Die Cast Beavertail Style
            Silver badge dedicated to Gladstone and 12th and Vine series 
            kits
            Sizes: (depth x diameter) Bebop 
            14x22 Bass Drum
            16x16 Floor tom
            9x13 Mounted Tom
            6.5x14 Snare drum'
        ),
        ('TOP GERMAN PIANO ACCORDION WELTMEISTER STELLA 96 bass&BRAND NEW STRAPS&HARD CASE', '2015-08-12', 1, 1, 'Weltmeister', null, 'Very Good', 378.25, '/img/9.png',
            'Beautiful Piano Accordion   Weltmeister  Stella  -  96 bass, 5 registers 
            -=VERY RARE EDITION=-
            ( black color )
            &
            HARD CASE
             +
            ~brand new set high quality leather shoulder straps (HANDMADE)~
            Made in DDR/Germany
            FINEST GERMAN QUALITY
            ******
            *5 switches
            * Full size keyboard / 34 piano keys  /.
            * 96 basses.
            * mechanically and acoustically:  TOP condition  !!!
            / excellent working and sounding order /
            ::: strong German mechanics :::
            * Very good playable. AMAZING sounds!
            …charming & lovely tone…
            << cleaned and tuned >>
            absolutely prepared for playing
            * Every note, reed, key, button works perfectly.
            - For more information, photos and travel expenses just msg me.'
        ),
        ('Schilke B1 Silver Trumpet + 4 Valve Getzen Eterna Flugelhorn + Schilke Case', '2015-08-12', 2, 2, 'Schilke', 1971, 'Good', 1125.00, '/img/10.png',
            'Saying goodbye to 2 great horns. The Schilke is a 1971 B1 
            and the Getzen Eterna\'s serial number puts it around 1972-1975.   
            Both are Silver, and I did my best to clean up and polish, but 
            fboth could probably use a professional bath and polishing. 
            These are used trumpets - they have been played hard by myself 
            and the pro who owned them before me.   However, all parts move 
            and I oiled and greased them up myself - even played for 5 
            minutes before my chops gave.   
            Both have their accompanying dings and scratches.  
            The Schilke has some flaking of the silver plating in a couple 
            of spots around the grip (please see pictures).  Also the pads 
            around the valve pistons are a little worn.  Serial number: 4736  - 
            Mouthpiece not included.
            The Getzen has a major dent in the main bell (see picture).   
            However, both play and still sound great - and would sound even 
            better in the hands of a pro. 
            Serial Number: KH797  - Mouthpiece included.  
            The case is in great condition with a few minor blemishes on the 
            outside.  
            TRUMPET STAND NOT INCLUDED'
        );


