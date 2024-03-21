<?php
/*
Template Name: Universal Fitness Survey- Admin
*/

get_header();
?>
                  <style>
    option[value="0"],
    option[value="1"],
    option[value="2"],
    option[value="3"] {
        color: red;
    }

    option[value="4"],
    option[value="5"],
    option[value="6"] {
        color: orange;
    }
    option[value="7"],
    option[value="8"],
    option[value="9"],
    option[value="10"]{
        color: green;
    }

	
  table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed; /* Added property */
  }

  th, td {
    border: 1px solid black;
    background-color: green;
    text-align: center; /* Center align text */
    padding: 8px; /* Add padding for spacing */
  }

  #RED {
    background-color: red;
  }

  #YELLOW {
    background-color: orange;
  }
  
    #white {
    background-color: white;
  }
	
	

  #Excellent, #Dreadful {
    width: 10%; /* Adjust width as needed */
  }
	
	#Dreadful {
		background-color: red;
	}

</style>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="entry-content">
            <?php
            // Check if the current user has admin or contributor roles
            $current_user = wp_get_current_user();
            if (in_array('administrator', (array)$current_user->roles) || in_array('contributor', (array)$current_user->roles)) {
                $current_user = wp_get_current_user();
                $user_id = $current_user->ID;
                $user_email_domain = substr(strrchr($current_user->user_email, "@"), 1);

                if (current_user_can('manage_options')) {
                    // If the user is an admin, allow them to search for any user
                    $users = get_users(array('role__in' => array('subscriber', 'contributor')));
                } else {
                    // If the user is not an admin, allow them to search for users with the same email domain
                    $users = get_users(array('role__in' => array('subscriber', 'contributor'), 'search' => "*@$user_email_domain"));
                }
                if ($users) {
                    ?>
                    <h2> Universal Fitness Survey</h2>
                    <form style="font-size:20px; color:black;" method="post" action="">
                        <div class="form-group">
                            <label for="staff_name">Staff Name:</label>
                            <select name="staff_name" id="staff_name">
                                <?php
                                foreach ($users as $user) {
                                    echo '<option value="' . esc_attr($user->user_login) . '">' . esc_html($user->display_name) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div style="height: 30px;"></div> <!-- Add a gap -->
                        <div class="form-group">
                            <label for="date">Attendance Date:</label>
                            <input type="date" name="date" id="date" required>
                        </div>
						
                       

                        <div style="height: 30px;"></div> <!-- Add a gap -->
<div class="form-group">
                    <label for="q1">Q1 20m run: number of 20m laps in 5 minutes:</label>
				<table>
			
                      <tr>
                      	<th id="Dreadful">Male</th>
						<th id="RED"> <20</th>
						<th id="RED">22</th>
						<th id="RED">26</th>
						<th id="RED">32</th>
						<th id="YELLOW">36</th>
						<th id="YELLOW">38</th>
						<th id="YELLOW">40</th>
						<th>45</th>
						<th>50</th>
						<th>53</th>
						<th>55</th>
                      
                      </tr>
                              <tr>
                      	<th id="Dreadful">Female</th>
						<th id="RED"> <20   </th>
						<th id="RED">20</th>
						<th id="RED">24</th>
						<th id="RED">30</th>
						<th id="YELLOW">34</th>
						<th id="YELLOW">36</th>
						<th id="YELLOW">38</th>
						<th>43</th>
						<th>46</th>
						<th>49</th>
						<th>52</th>
                      
                      </tr>
                      
                      		  <tr>
						<th id="white">Score</th>
						<th id="white">0</th>
						<th id="white">1</th>
						<th id="white">2</th>
						<th id="white">3</th>
						<th id="white">4</th>
						<th id="white">5</th>
						<th id="white">6</th>
						<th id="white">7</th>
						<th id="white">8</th>
						<th id="white">9</th>
						<th id="white">10</th>
					  </tr>
					</table>
                    <select name="q1" id="q1" onChange="onChange(this)">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

						                <div style="height: 30px;"></div> <!-- Add a gap -->
                <div class="form-group">
                    <label for="q2">Q2 Situps - consecutive number of sit-ups until exhaustion - feet held, hands clasping opposite shoulders, coming up so elbows touch the
knees, upper back (not head) 'hitting' the ground:</label>
														<table>
			
                      <tr>
                      	<th id="white"></th>
						<th id="RED"> <5</th>
						<th id="RED"><10</th>
						<th id="RED">10</th>
						<th id="RED">15</th>
						<th id="YELLOW">20</th>
						<th id="YELLOW">25</th>
						<th id="YELLOW">30</th>
						<th>40</th>
						<th>50</th>
						<th>60</th>
						<th>70</th>   
                      </tr>
                      		  <tr>
						<th id="white">Score</th>
						<th id="white">0</th>
						<th id="white">1</th>
						<th id="white">2</th>
						<th id="white">3</th>
						<th id="white">4</th>
						<th id="white">5</th>
						<th id="white">6</th>
						<th id="white">7</th>
						<th id="white">8</th>
						<th id="white">9</th>
						<th id="white">10</th>
					  </tr>
					</table>
                    <select name="q2" id="q2">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

                <div style="height: 30px;"></div> <!-- Add a gap -->
                <div class="form-group">
                    <label for="q3">Q3 Squats - consecutive number of squats until exhaustion. Bottom must go down to mid-way between knees and ankles. Most people will
need to use a heel raise to successfully complete the test:</label>
														<table>
			
                      <tr>
                      	<th id="white"></th>
						<th id="RED"> <5</th>
						<th id="RED"><10</th>
						<th id="RED">10</th>
						<th id="RED">15</th>
						<th id="YELLOW">20</th>
						<th id="YELLOW">25</th>
						<th id="YELLOW">30</th>
						<th>40</th>
						<th>50</th>
						<th>60</th>
						<th>70</th>
                      
                      </tr>
               
                      
                      		  <tr>
						<th id="white">Score</th>
						<th id="white">0</th>
						<th id="white">1</th>
						<th id="white">2</th>
						<th id="white">3</th>
						<th id="white">4</th>
						<th id="white">5</th>
						<th id="white">6</th>
						<th id="white">7</th>
						<th id="white">8</th>
						<th id="white">9</th>
						<th id="white">10</th>
					  </tr>
					</table>
					<select name="q3" id="q3">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

                <div style="height: 30px;"></div> <!-- Add a gap -->
                <div class="form-group">
                    <label for="q4">Q4 Arm hang (Second) - hanging from a bar until exhaustion:</label>
							<table>
			
                      <tr>
                      	<th id="Dreadful">Male</th>
						<th id="RED"> <80</th>
						<th id="RED"><35</th>
						<th id="RED"><30</th>
						<th id="RED"><28</th>
						<th id="YELLOW"><26</th>
						<th id="YELLOW"><24</th>
						<th id="YELLOW"><22</th>
						<th><20</th>
						<th><18</th>
						<th><16</th>
						<th><14</th>
                      
                      </tr>
                              <tr>
                      	<th id="Dreadful">Female</th>
						<th id="RED"> <20   </th>
						<th id="RED">20</th>
						<th id="RED">24</th>
						<th id="RED">30</th>
						<th id="YELLOW">34</th>
						<th id="YELLOW">36</th>
						<th id="YELLOW">38</th>
						<th>43</th>
						<th>46</th>
						<th>49</th>
						<th>52</th>
                      
                      </tr>
                      
                      		  <tr>
						<th id="white">Score</th>
						<th id="white">0</th>
						<th id="white">1</th>
						<th id="white">2</th>
						<th id="white">3</th>
						<th id="white">4</th>
						<th id="white">5</th>
						<th id="white">6</th>
						<th id="white">7</th>
						<th id="white">8</th>
						<th id="white">9</th>
						<th id="white">10</th>
					  </tr>
					</table>
                    <select name="q4" id="q4">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

                <div style="height: 30px;"></div> <!-- Add a gap -->
                <div class="form-group">
                    <label for="q5">Q5 Pressups - consecutive number of press ups until exhaustion - men on toes, women on knees:</label>
												<table>
			
                      <tr>
                      	<th id="white"></th>
						<th id="RED"> <5</th>
						<th id="RED"><10</th>
						<th id="RED">10</th>
						<th id="RED">15</th>
						<th id="YELLOW">20</th>
						<th id="YELLOW">25</th>
						<th id="YELLOW">30</th>
						<th>40</th>
						<th>50</th>
						<th>60</th>
						<th>70</th>
                      
                      </tr>
               
                      
                      		  <tr>
						<th id="white">Score</th>
						<th id="white">0</th>
						<th id="white">1</th>
						<th id="white">2</th>
						<th id="white">3</th>
						<th id="white">4</th>
						<th id="white">5</th>
						<th id="white">6</th>
						<th id="white">7</th>
						<th id="white">8</th>
						<th id="white">9</th>
						<th id="white">10</th>
					  </tr>
					</table>
                    <select name="q5" id="q5">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                                                        <div style="height: 30px;"></div> <!-- Add a gap -->

                        <div class="form-group">
                            <input type="submit" name="submit_attendance" value="Submit">
                        </div>
						
                    </form>

                    <?php
                    // Process form submission
                    if (isset($_POST['submit_attendance'])) {
                        global $wpdb;

    $user_login = sanitize_text_field($_POST['staff_name']);
    $user_id = get_user_by('login', $user_login)->ID;
    $q1 = sanitize_text_field($_POST['q1']);
							    $q2 = sanitize_text_field($_POST['q2']);
    $q3 = sanitize_text_field($_POST['q3']);
    $q4 = sanitize_text_field($_POST['q4']);
    $q5 = sanitize_text_field($_POST['q5']);
    $date = sanitize_text_field($_POST['date']);
	$total = $q1 + $q2 + $q3 + $q4 + $q5;



                        // Insert data into the custom table
                  // Insert data into the custom table
    $table_name = 'universal_fitness_survey';
    $wpdb->insert(
        $table_name,
        array(
            'user_id' => $user_id,
            'date' => $date, // Corrected variable name
            'q1' => $q1, // Corrected variable name
						'q2' => $q2, // Corrected variable name
			'q3' => $q3, // Corrected variable name
			'q4' => $q4, // Corrected variable name
			'q5' => $q5, // Corrected variable name
			'total' => $total, // Corrected variable name


        ),
        array('%d', '%s', '%s','%s','%s','%s')
    );

                        echo '<p>Attendance recorded successfully!</p>';
                    }
                } else {
                    echo '<p>No staff members found for the current user.</p>';
                }
            } else {
                echo '<p>Access denied. You do not have the required roles to view this page.</p>';
            }
            ?>
        </div>
    </main>
</div>

<?php
get_footer();
?>
