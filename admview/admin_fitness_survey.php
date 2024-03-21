<?php
/*
Template Name: Fitness Survey- Admin
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
                    <h2> Fitness Survey</h2>
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
						
                       

                        <div style="height: 30px;"></div> <!-- Add a gap --><div class="form-group">
                    <label for="q1">Are you keeping yourself fit and healthy to the best of your ability?
						<table>
					  <tr>
						<th id="Dreadful">No</th>
						<th id="RED">0</th>
						<th id="RED">1</th>
						<th id="RED">2</th>
						<th id="RED">3</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
						<th id="Excellent">Yes</th>
					  </tr>
					</table>
	</label>
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
                    <label for="q2">The body is an ecosystem. What was your score on the Health Climate Survey?
										<table>
			
                      <tr>
                      	<th id="white"></th>
						<th id="RED"> <120   </th>
						<th id="RED">110</th>
						<th id="RED">90</th>
						<th id="RED">80</th>
						<th id="YELLOW">70</th>
						<th id="YELLOW">60</th>
						<th id="YELLOW">50</th>
						<th>40</th>
						<th>30</th>
						<th>23</th>
						<th><20</th>
                      
                      </tr>

                      		  <tr>
						<th id="white">Score</th>
						<th id="RED">0</th>
						<th id="RED">1</th>
						<th id="RED">2</th>
						<th id="RED">3</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th id="green">7</th>
						<th id="green">8</th>
						<th id="green">9</th>
						<th id="green">10</th>
					  </tr>
					</table>
					
					</label>
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
                    <label for="q3">Fatness. How close are you to being your ideal weight? Scores based on the number of kilos of body fat over what you consider to be your ideal weight.
							<table>
			
                      <tr>
                      	<th id="white">ideal weight</th>
						<th id="RED"> >35   </th>
                        						<th id="RED"> <35   </th>
						<th id="RED"><30</th>
						<th id="RED"><25</th>
						<th id="YELLOW"><20</th>
						<th id="YELLOW"><15</th>
						<th id="YELLOW"><10</th>
						<th id=""><8</th>
						<th><6</th>
						<th><4</th>
						<th><2</th>                      
                      </tr>
                              <tr>
                      	<th id="white">%fat men</th>
						<th id="RED"> <36   </th>
						<th id="RED">36</th>
						<th id="RED">34</th>
						<th id="RED">32</th>
						<th id="YELLOW">30</th>
						<th id="YELLOW">28</th>
						<th id="YELLOW">36</th>
						<th>24</th>
						<th>22</th>
						<th>20</th>
						<th>18</th>
                      
                      </tr>
                      
                      
                       <tr>
                      	<th id="white">%fat women</th>
						<th id="RED"> >44   </th>
						<th id="RED">46</th>
						<th id="RED">44</th>
						<th id="RED">43</th>
						<th id="YELLOW">40</th>
						<th id="YELLOW">38</th>
						<th id="YELLOW">36</th>
						<th>34</th>
						<th>32</th>
						<th>30</th>
						<th>28</th>
                      
                      </tr>  


                      
                      	
                      		  <tr>
						<th id="white">Score</th>
						<th id="RED">0</th>
						<th id="RED">1</th>
						<th id="RED">2</th>
						<th id="RED">3</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th id="">7</th>
						<th >8</th>
						<th>9</th>
						<th>10</th>
					  </tr>
					</table>
                   
					</label>
                   <!-- <br> <img src="https://workhealthandfitnessrecord.com.au/wp-content/uploads/2024/03/1.png" alt="Demo" width="500" height="500"> -->
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
                    <label for="q4">How many full squats can you do in 90 seconds. Bottom must get midway between knees and ankles. Use a heel raise if you need to.
								<table>
			
                      <tr>
                      	<th id="white"></th>
						<th id="RED"> <7   </th>
						<th id="YELLOW">7</th>
						<th id="YELLOW">10</th>
						<th id="YELLOW">15</th>
						<th id="">20</th>
						  						  <th id="">23</th>

						<th id="">25</th>
						<th id="">30</th>

                      
                      </tr>

                      		  <tr>
						<th id="white">Score</th>
						<th id="RED">0</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th id="green">7</th>
						<th id="green">8</th>
						<th id="green">9</th>
						<th id="green">10</th>
					  </tr>
					</table>
					
					
					</label>
                    <select name="q4" id="q4">
                        <option value="0">0</option>
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
                    <label for="q5">Abdominal strength - sit-ups
												<table>
			
                      <tr>
                           	<th id="white"></th>
						<th id="RED"> <7   </th>
						<th id="YELLOW">7</th>
						<th id="YELLOW">10</th>
						<th id="YELLOW">15</th>
						<th id="">20</th>
						  						  <th id="">23</th>

						<th id="">25</th>
						<th id="">30</th>
                      
                      </tr>

                      		  <tr>
						<th id="white">Score</th>
						<th id="RED">0</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th id="green">7</th>
						<th id="green">8</th>
						<th id="green">9</th>
						<th id="green">10</th>
					  </tr>
					</table>
					
					
					</label>
                    <select name="q5" id="q5">
                        <option value="0">0</option>
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
                    <label for="q6">Upper body strength - press-ups. Number in 90 seconds. Men on toes, women on front of thighs
												<table>
			
                      <tr>
                       	<th id="white"></th>
						<th id="RED"> <7   </th>
						<th id="YELLOW">7</th>
						<th id="YELLOW">10</th>
						<th id="YELLOW">15</th>
						<th id="">20</th>
						  						  <th id="">23</th>

						<th id="">25</th>
						<th id="">30</th>

                      
                      </tr>

                      		  <tr>
						<th id="white">Score</th>
						<th id="RED">0</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th id="green">7</th>
						<th id="green">8</th>
						<th id="green">9</th>
						<th id="green">10</th>
					  </tr>
					</table>
				
					</label>
                    <select name="q6" id="q6">
                        <option value="0">0</option>
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
                    <label for="q7">Flexibility - sit and reachIn a sitting position, with feet outstretched in front of you, see how far down past your toes you can reach with your fingers. Keep you knees straight.
					<table>
							  <tr>
						<th id="white"></th>
						<th id="RED">Can't Touch</th>
						<th id="RED"></th>
						<th id="RED"></th>
						<th id="RED"></th>
						<th id="YELLOW">finger</th>
						<th id="YELLOW"></th>
						<th id="YELLOW"></th>
						<th>Palm</th>
						<th></th>
						<th></th>
						<th>Wrist</th>
					  </tr>
					  <tr>
						<th id="white">Score</th>
						<th id="RED">0</th>
						<th id="RED">1</th>
						<th id="RED">2</th>
						<th id="RED">3</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
					  </tr>
					</table>
				
					</label>
                    <select name="q7" id="q7">
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
                    <label for="q8">Ability to sit up straight - Right leg on top
					<table>
					  <tr>
						<th id="Dreadful">Dreadful</th>
						<th id="RED">0</th>
						<th id="RED">1</th>
						<th id="RED">2</th>
						<th id="RED">3</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
						<th id="Excellent">Excellent</th>
					  </tr>
					</table>
					</label>
                    <select name="q8" id="q8">
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
                    <label for="q9">Ability to sit up straight - left leg on top
					<table>
					  <tr>
						<th id="Dreadful">Dreadful</th>
						<th id="RED">0</th>
						<th id="RED">1</th>
						<th id="RED">2</th>
						<th id="RED">3</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
						<th id="Excellent">Excellent</th>
					  </tr>
					</table>
					
					
					</label>
                    <select name="q9" id="q9">
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
                    <label for="q10">Shoulder function - Distance (cms) from wall when forearms are vertical.
							<table>
			
                      <tr>
                      	<th id="white"></th>
						<th id="RED"> >15   </th>
						<th id="RED">15</th>
						<th id="RED">13</th>
						<th id="RED">11</th>
						<th id="YELLOW">9</th>
						<th id="YELLOW">7</th>
						<th id="YELLOW">5</th>
						<th>3</th>
						<th>2</th>
						<th>1</th>
						<th>0</th>
                      
                      </tr>

                      		  <tr>
						<th id="white">Score</th>
						<th id="RED">0</th>
						<th id="RED">1</th>
						<th id="RED">2</th>
						<th id="RED">3</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th id="green">7</th>
						<th id="green">8</th>
						<th id="green">9</th>
						<th id="green">10</th>
					  </tr>
					</table>
					
					</label>
                    <select name="q10" id="q10">
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
                    <label for="q11">Aerobic fitness - 5 minute, 20m lap run.
			  		<table>
								  <tr>
						<th id="white">M</th>
						<th id="RED"><20</th>
						<th id="RED">20</th>
						<th id="RED">22</th>
						<th id="RED">24</th>
						<th id="YELLOW">26</th>
						<th id="YELLOW">28</th>
						<th id="YELLOW">30</th>
						<th>34</th>
						<th>38</th>
						<th>38</th>
						<th>40</th>
					  </tr>
								  <tr>
						<th id="white">F</th>
						<th id="RED"><18</th>
						<th id="RED">18</th>
						<th id="RED">20</th>
						<th id="RED">22</th>
						<th id="YELLOW">24</th>
						<th id="YELLOW">26</th>
						<th id="YELLOW">28</th>
						<th>32</th>
						<th>34</th>
						<th>36</th>
						<th>38</th>
					  </tr>
					  <tr>
						<th id="Dreadful">Poor</th>
						<th id="RED">0</th>
						<th id="RED">1</th>
						<th id="RED">2</th>
						<th id="RED">3</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
						<th id="Excellent">Good</th>
					  </tr>
					</table>
			 
			  </label>
                    <select name="q11" id="q10">
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
                    <label for="q12">Aerobic Training sessions per week - of at least 30 minutes with heart rate over 120.
			  						<table>
										  <tr>
						<th id="white"></th>
						<th id="RED">50</th>
						<th id="RED">100</th>
						<th id="RED"></th>
						<th id="RED"></th>
						<th id="YELLOW">120</th>
						<th id="YELLOW"></th>
						<th id="YELLOW">150</th>
						<th></th>
						<th>200</th>
						<th></th>
											  <th>240 </th>
					  </tr>
					  <tr>
						<th id="white">Score</th>
						<th id="RED">0</th>
						<th id="RED">1</th>
						<th id="RED">2</th>
						<th id="RED">3</th>
						<th id="YELLOW">4</th>
						<th id="YELLOW">5</th>
						<th id="YELLOW">6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
					  </tr>
					</table>
			  
			  
			  
			  </label>
                    <select name="q12" id="q12">
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
    $q6 = sanitize_text_field($_POST['q6']);
    $q7 = sanitize_text_field($_POST['q7']);
    $q8 = sanitize_text_field($_POST['q8']);
    $q9 = sanitize_text_field($_POST['q9']);
    $q10 = sanitize_text_field($_POST['q10']);
    $q11 = sanitize_text_field($_POST['q12']);
    $q12 = sanitize_text_field($_POST['q12']);
    $date = sanitize_text_field($_POST['date']);
	$total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11+ $q12;



                        // Insert data into the custom table
                  // Insert data into the custom table
    $table_name = 'fitness_survey';
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
			'q6' => $q6, // Corrected variable name
			'q7' => $q7, // Corrected variable name
			'q8' => $q8, // Corrected variable name
			'q9' => $q9, // Corrected variable name
			'q10' => $q10, // Corrected variable name
						'q11' => $q11, // Corrected variable name
			'q12' => $q12, // Corrected variable name

			'total' => $total, // Corrected variable name


        ),
        array('%d', '%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')
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
