<div class="content">
            <div class="contact-container">
                <form method="post" action="./PHP/contact.php">
                    <div id="contact-header">
                        <h2>Contact us!</h2>
                    </div>
                    <div class="contact-input">
                        <input type="text" name="name" required>
                        <span>Name</span>
                        <i></i>
                    </div>
                    <div class="contact-message">
                        <label for="message">Send us a message!</label>
                        <textarea name="message" id="message" maxlength="144" required></textarea>
                    </div>
                    <div class="contact-btn">
                        <button type="submit">Send Message</button>
                    </div>  
                </form> 
                
                <div class="locate">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.360610021504!2d19.66634991572855!3d46.89562597914387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sNeumann%20J%C3%A1nos%20Egyetem%20GAMF%20M%C5%B1szaki%20%C3%A9s%20Informatikai%20Kar!5e0!3m2!1shu!2shu!4v1678793571541!5m2!1shu!2shu"></iframe>
                    </div>
                </div>
                
            </div>
           
            <div class="message-container">
                <div id="message-header"> 
                    <h2>Messages from you!</h2>
                </div>
                <div class="message-box">
                        <?php
                            include './PHP/functions.php';
                            connectDataBase();
                            // Retrieve messages from the database
                            $sql = "select * from Contact order by ID DESC limit 6";
                            $result = connectDatabase()->query($sql);
                        
                            if ($result->num_rows > 0) {
                        
                                // Display each message
                                while($row = $result->fetch_assoc()) {
                                    echo '<div class="display-message"> ';
                                        echo '<div class="nameanddate"> ';
                                            echo '<div class="name"> ';
                                                echo  $row['nameFrom'];
                                            echo '</div>';

                                            echo '<div class="date"> ';
                                                echo $row['Datum'];
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="message"> ';
                                            echo  "<textarea maxlength='144' readonly>";
                                                echo $row['Message'];
                                            echo "</textarea>";
                                        echo '</div>';
                                    echo '</div>';
                                }
                        
                            } else {
                                echo 'No messages found';
                            }
                        
                            // Close the database connection
                            connectDataBase()->close();
                        ?>
                </div>
            </div>
        </div>