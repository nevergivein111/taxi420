<?php $javascript->link('birth.js', false); ?>
<div class="warning">Note : Dont Use Yahoo email address for Registration ,You may not get The confirmation mail (Also check your spam Folder of Your email service)</div>
<div id="main">
    <!-- content of main -->
    
    
    
    
    
    <div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        	<h2 class="underlined">SIGN UP </h2>
            <h4>Add a User</h4>
        	<p>&nbsp;</p>
        </div>
    	<!-- /Intro page -->  
        
        
        
        <!-- col_270_left --><!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
        
      <div id="left_part">
        
        	<!-- Form block -->
            <div class="form_block">
                <div class="inside">
       <?php echo $this->Form->create('User');?>
				                	<div class="form_left">
                    	<label for="contact_name">Username  </label>
                    <?php echo $this->Form->input('username',array('label'=>'')); ?>
  </div>
                	<div class="form_right">
                    	<label for="contact_email">Password</label>
        <?php echo $this->Form->input('password',array('label'=>'')); ?>
                	</div>
                  <div class="separator"></div>
                  <div class="form_left">
                    	<label for="contact_name">Email </label> (Yahoo Email Address may not work)
           <?php echo $this->Form->input('email',array('label'=>'')); ?>
               	  </div>
                	<div class="form_right">
                    	<label for="contact_email">Sex  </label>
                   	<?php
	$options=array("male"=>"male","female"=>"female");
	
	
		echo $form->input('sex', array(
'type' =>'select', 
'label'=>'',
'options' => $options,
'empty' => 'Select Sex'
));
	
	?>
               	  </div>
                  <div class="separator">
                    <div>
                    
                    
                    
                    
                     
                    </div>
                    <div class="form_left">
                    <br />
                   	  <label for="contact_name">Date of Birth </label>


    
<select id="months" name="DateOfBirth_Month">
		<option value="123">- Month - </option>
		<option value="0">January</option>
		<option value="1">February</option>
		<option value="2">March</option>
		<option value="3">April</option>
		<option value="4">May</option>
		<option value="5">June</option>
		<option value="6">July</option>
		<option value="7">August</option>
		<option value="8">September</option>
		<option value="9">October</option>
		<option value="10">November</option>
		<option value="11">December</option>
	</select>
    <select id="days" name="DateOfBirth_Day">
		<option>- Day -</option>
	</select>


<select name="DateOfBirth_Year">
	<option value="123"> - Year - </option>
	<option value="2004">2004</option>
	<option value="2003">2003</option>
	<option value="2002">2002</option>
	<option value="2001">2001</option>
	<option value="2000">2000</option>
	<option value="1999">1999</option>
	<option value="1998">1998</option>
	<option value="1997">1997</option>
	<option value="1996">1996</option>
	<option value="1995">1995</option>
	<option value="1994">1994</option>
	<option value="1993">1993</option>
	<option value="1992">1992</option>
	<option value="1991">1991</option>
	<option value="1990">1990</option>
	<option value="1989">1989</option>
	<option value="1988">1988</option>
	<option value="1987">1987</option>
	<option value="1986">1986</option>
	<option value="1985">1985</option>
	<option value="1984">1984</option>
	<option value="1983">1983</option>
	<option value="1982">1982</option>
	<option value="1981">1981</option>
	<option value="1980">1980</option>
	<option value="1979">1979</option>
	<option value="1978">1978</option>
	<option value="1977">1977</option>
	<option value="1976">1976</option>
	<option value="1975">1975</option>
	<option value="1974">1974</option>
	<option value="1973">1973</option>
	<option value="1972">1972</option>
	<option value="1971">1971</option>
	<option value="1970">1970</option>
	<option value="1969">1969</option>
	<option value="1968">1968</option>
	<option value="1967">1967</option>
	<option value="1966">1966</option>
	<option value="1965">1965</option>
	<option value="1964">1964</option>
	<option value="1963">1963</option>
	<option value="1962">1962</option>
	<option value="1961">1961</option>
	<option value="1960">1960</option>
	<option value="1959">1959</option>
	<option value="1958">1958</option>
	<option value="1957">1957</option>
	<option value="1956">1956</option>
	<option value="1955">1955</option>
	<option value="1954">1954</option>
	<option value="1953">1953</option>
	<option value="1952">1952</option>
	<option value="1951">1951</option>
	<option value="1950">1950</option>
	<option value="1949">1949</option>
	<option value="1948">1948</option>
	<option value="1947">1947</option>
	<option value="1946">1946</option>
	<option value="1945">1945</option>
	<option value="1944">1944</option>
	<option value="1943">1943</option>
	<option value="1942">1942</option>
	<option value="1941">1941</option>
	<option value="1940">1940</option>
	<option value="1939">1939</option>
	<option value="1938">1938</option>
	<option value="1937">1937</option>
	<option value="1936">1936</option>
	<option value="1935">1935</option>
	<option value="1934">1934</option>
	<option value="1933">1933</option>
	<option value="1932">1932</option>
	<option value="1931">1931</option>
	<option value="1930">1930</option>
	<option value="1929">1929</option>
	<option value="1928">1928</option>
	<option value="1927">1927</option>
	<option value="1926">1926</option>
	<option value="1925">1925</option>
	<option value="1924">1924</option>
	<option value="1923">1923</option>
	<option value="1922">1922</option>
	<option value="1921">1921</option>
	<option value="1920">1920</option>
	<option value="1919">1919</option>
	<option value="1918">1918</option>
	<option value="1917">1917</option>
	<option value="1916">1916</option>
	<option value="1915">1915</option>
	<option value="1914">1914</option>
	<option value="1913">1913</option>
	<option value="1912">1912</option>
	<option value="1911">1911</option>
	<option value="1910">1910</option>
	<option value="1909">1909</option>
	<option value="1908">1908</option>
	<option value="1907">1907</option>
	<option value="1906">1906</option>
	<option value="1905">1905</option>
	<option value="1904">1904</option>
	<option value="1903">1903</option>
	<option value="1902">1902</option>
	<option value="1901">1901</option>
	<option value="1900">1900</option>
</select>

                       	
    
<p></p>
                    </div>
                    <label for="contact_name" class="r"><br />
                    </label>
                    <br />
</div>
                  <div class="separator">
                  </div>
                  <div class="clear"></div>
                               
                  <div id="getit" class="form_right">
                                                    <?php $is= rand(0, 10); ?>
                                    <?php $sec= rand(0, 10); ?>
                                     <?php 	echo $this->Form->input('ist',array("label"=>"","type"=>"hidden","value"=>$is)); ?>
                                      <?php 	echo $this->Form->input('2nd',array("label"=>"","type"=>"hidden","value"=>$sec)); ?>
         
                                    <label for="check">Are you a human ?</label>
									<div><span id="num1"><?php echo $is; ?></span> + <span id="num2"><?php echo $sec; ?></span> = <input type="text" name="check" id="check" size="3" maxlength="3" class="field required number" /></div><span id="errorcaptcha"></span></div>                                <div class="clear"></div>
                                <div class="form_submit">
                                    <div id="submitter"></div>
                                </div>
                    
      
                    </div>
                </form>
                
                
                
                
                
                </div>
            </div>
        	<!-- /Form block -->
            
		</div>
        <!-- /Left part 600px -->
    
    
    <br class="clear" />
    </div>
    
    
    
    
     
    
    
    <div class="content"><!-- Left part 600px --><!-- /Left part 600px -->
        
        
        
        <!-- Sidebar 270px --><!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />
    </div>
    <!-- /content of main -->
</div>