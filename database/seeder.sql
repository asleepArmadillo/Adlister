USE adlister_db;

TRUNCATE listings;

INSERT INTO listings(title, type, brand, year, condition, price, image_url, description)

VALUES  ('1963 Jaguar', 'guitar', 'Fender', 1963, 'Excellent', 2995.00, '/img/1.png',
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
        ('CONN 12M BARI SAX BARITONE SAXOPHONE', 'woodwind', 'Conn', 1967, 'Refurbished', 2950.00, '/img/2.png',
            'The restoration was done by a respected local craftsman 
            with over 40 years experience in woodwind and brass instrument 
            restorations and repairs. The shop’s woodwind specialist used 
            to work at the King Instrument Co. factory in Eastlake, Ohio 
            and does impeccable work.  I have personally used this company 
            for over 10 years for my adult band members and myself.  
            Everyone has always been impressed with their work.'
        ),
        ('Hammond B3 organ with leslie cabinet', 'piano/keys', 'Hammond', 1965, 'Very Good', 12500.00, '/img/3.png',
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
        );


TRUNCATE categories;

INSERT INTO categories(type)

VALUES ();

TRUNCATE users;

INSERT INTO users(name, email, password, phone)

VALUES ();