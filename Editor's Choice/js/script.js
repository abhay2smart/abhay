function EditorChoice(){
	"use strict";
	this.gameData = {
		slides: 2,
		timeIneterval: 60,
		title: "Editor's Choice",
		desp: "Excercise your vocabulary by quickly selecting synonyms.",
		playText: "Play",	
		width: 200,
		height: 200,
		synonymList: {
			words: [
				['***happy','*glad','chin','**cheerful','trump','*pleased','victory'],
				['***run','**away','chin','**escape','*rush','hunk','spike'],
				['***hurry','**race','flee','veil','**accelerate','*speed','dive'],
				['***do','**conclude','*finish','pace','prance','**accomplish','*achieve','gimmic'],
				['***crooked','**bent','corpulent','**curved','*zigzag','*twisted','indolent','rest'],
				['***predicament','horrid','**quandary','indecent','**pickle','*jam','*scrape','dreary'],
				['***intention','envious','**goal','interpose','**objective','seditious','*purpose'],
				['***limp','**flabby','infatuation','languor','**flaccid','*floppy','libel'],
				['***negligent','temper	','**slack','mischance','**remiss','*lax','babel'],				
				['***plausible','constitution','**credible','impish','genteel','**believable','*colorable'],
				['***regard','**respect','rebuff','flinch','retrieve','**esteem','*admiration'],
				['***severe','keen','impudent','**stern','**austere','*ascetic','staid'],
				['***gesture','**gesticulation','peer','replete','**sign','vertiginous','*signal'],
				['***hamper','cumbersome','**hobble','vivid','**shackle','rectitude','*manacle'],
				['***grieve','**lament','award','**sorrow','*mourn','steer','mound'],
				['***impostor','indecorous','**charlatan','**quack','*faker','pattern','import'],
				['***chronic','election','conviction','**confirmed','inadvertent','**inveterate','*habitual'],
				['***breeze','**cinch','posy','**walkover','*snap','brim','somatic'],
				['***fawn','vogue','**slaver','untangle','treacherous','**bootlick','*toady'],
				['***native','agile','brawny','spruce','**indigenous','**endemic','*aboriginal']				
			]
		}
	}	
	this.htmlTemplates={
		footer: ()=> {
			return	`<div class="audio_row clear_both position_relative height_thirty">
						<div class="controls_section auto_margin">
							<div class="pointer_cursor circle_shape help_mark text_center float_left">
								&#63;
							</div>
							<div class="pointer_cursor circle_shape help_mark text_center float_left play_pause" id="btn_play_pause">														
								<i class="fa fa-pause play_pause" aria-hidden="true"></i>
							</div>
							<div class="pointer_cursor sound_event circle_shape float_left" id="mute_unmute"> 								
								${this.changeSoundIcon()}
							</div>
						</div>
					</div>`;
		},
		homeHtml: ()=>{
				return `<div class="top_border"></div>		
						<div class="sub_container" style="float:left">
							<div class="title_editor_choice white_color text_center" id="head_title">${this.gameData.title}</div>
							<div class="description_text font_eighteen white_color text_center" id="description">
								${this.gameData.desp}
							</div>				
							<div class="play_btn_row">
								<div class="play_btn_wrapper auto_margin height_fourty">									
									<button class="btn_play_event white_color study_next_button white_color auto_margin bold_font" type="button" name="btn_study_next" id="btn_study_next">
										${this.gameData.playText}  <i class="btn_play_event fa fa-arrow-right" aria-hidden="true" style="font-size:13px;"></i>
									</button>									
								</div>								
							</div>
							<div class="user_msg position_relative white_color clear_both text_center" id="user_suggestion_id">
								<div class="user_msg_subsection auto_margin bold_font">								
									<span id="user_suggestion"></span>
								</div>
								<div class="play_pause_icon_separater"></div>
								<div class="progress_text">	
									Your game is still in progress.
								</div>
								<div class="continue_text">	
									Click here to continue playing.
								</div>
							</div>
						</div>					
						<div class="audio_row clear_both position_relative height_thirty">
							<div class="controls_section auto_margin">
								<div class="pointer_cursor circle_shape help_mark text_center float_left" id="tutorial_icon">
									&#63;
								</div>
								<div class="circle_shape help_mark text_center float_left play_pause" id="btn_play_pause" style="pointer-events:none">														
									<i class="fa fa-pause play_pause" aria-hidden="true"></i>
								</div>
								<div class="pointer_cursor sound_event circle_shape float_left" id="mute_unmute"> 								
									${this.changeSoundIcon()}
								</div>
								<div style="height:460px;width:600px;top:-465px;left:-245px;background: #FFF;" class="position_relative no_appearance" id="tutorial_area">
									<span style="cursor:pointer;display:inline-block;height:30px;width:100px;background:#E3764B;border-radius:30px;color:#FFF;line-height:30px;top:3px;z-index:40;left:-102px" class="skip_tutorial_event text_center position_relative">Skip tutorial</span>
									<video id="tutorial_video_id" src="video/tutorial.mp4" height="457px;width="399px" style="top:-30px;left:3px" class="position_relative">
									</video>
								</div>
							</div>
						</div>`;
		
		},
		chooseLevelHtml: ()=> {
			return `<div class="top_border"></div>
					<div class="sub_container float_left">
						<div class="shift_down"></div>
						<div class="level_box_warapper auto_margin">
							<div class="wrapper_side_space_top_gap"></div>
							<div class="wrapper_side_space auto_margin">
								<div class="level_side_bar float_left height_fourty"></div> 
								<div class="float_left level_title bold_font text_center">CLICK THE HIGHLIGHTED LEVEL TO BEGIN.</div>
								<div class="float_right level_side_bar height_fourty"></div>	
								<div class="leveltitle_separater clear_both"></div>
								<div class="cloud_image_separater"></div>
								<div class="left_level_section float_left">
									<div>
										<img src="../layout/themes/bootstrap3-2016/editor_choice/images/tree.jpg" alt="tree.jpg" />
									</div>
									<div class="sun_image_separater"></div>
									<div>
										<img src="../layout/themes/bootstrap3-2016/editor_choice/images/sun.jpg" alt="sun.jpg" />
									</div>	
								</div>							
							</div>
							<div class="footer_line_separater clear_both"></div>
							<div class="level_footer_line auto_margin clear_both"></div>
							<div class="level_footer_text font_eighteen bold_font text_center">
								Quickly find two synonyms to reach a higher level.
							</div>
						</div>`;		
		},
		playHtml: ()=> {
			return `<div class="top_border"></div>
					<div class="sub_container float_left">						
						<div class="float_right height_thirty">
							<div class="float_left score_word text_center">
								TIME : <span id="time_left">${this.gameData.timeIneterval}</span>
							</div>
							<div class="float_left score_word text_center">
								WORD : <span id="wordCount">1</span> of ${this.gameData.synonymList.words.length}
							</div>					
							<div class="float_right score_word text_center">
								SCORE : <span id="score_lbl">0</span>
							</div>				
						</div>
						<div class="time_wordlist_row_gap clear_both"></div>						
						<div class="words_list_wrapper pink_background float_left position_relative bold_font">
							<div class="words_list pink_background float_left bold_font position_relative" id="word_list">							
								<div class="sub_word_list">								
									${this.util.randomNumber(this.gameData.synonymList.words.length), this.loadWords(this.level["key"], this.unique_rand_no)}
								</div>	
								</div>
							</div>
							<div class="level_panel pink_background float_left bold_font position_relative">
								<div class="sub_level_pannel auto_margin">
									<div class="level_text height_thirty">
										<!--level ${this.level["key"]}-->
										Time
									</div>								
									<div id="level_bar" class="level_bar_line_section">
										${this.createBars(60)}											
									</div>
									<div class="level_baseline height_thirty">										
									</div>
								</div>
							</div>
							<div class="user_msg white_color clear_both position_relative text_center" id="user_suggestion_id">
								<div class="user_msg_subsection auto_margin bold_font">								
									<span id="user_suggestion"></span>
								</div>
								<div class="play_pause_icon_separater"></div>								
							</div>
							<div id="play_pause_layer_id">
								<div class="progress_text_separater" id="progress_text_separater_id"></div>
								<div class="progress_text" id="progress_text_id">									
									<img src="images/video-play-icon.png" id="pause_icon_id"/>									
								</div>
								<div class="continue_text" id="continue_text_id">	
									
								</div>
							</div>	
						</div>
					</div>					
					<div class="audio_row clear_both position_relative height_thirty">
					<div class="controls_section auto_margin">
						<div class="circle_shape help_mark text_center float_left" id="tutorial_icon" style="pointer-events:none">
							&#63;
						</div>
						<div class="pointer_cursor circle_shape help_mark text_center float_left play_pause" id="btn_play_pause">														
							<i class="fa fa-pause play_pause" aria-hidden="true"></i>
						</div>
						<div class="pointer_cursor sound_event circle_shape float_left" id="mute_unmute"> 								
							${this.changeSoundIcon()}
						</div>
						<div style="height:460px;width:600px;top:-465px;left:-245px" class="position_relative no_appearance" id="tutorial_area">
							<span style="cursor:pointer;display:inline-block;height:30px;width:100px;background:#E3764B;border-radius:30px;color:#FFF;line-height:30px;top:3px;z-index:40;left:-102px" class="pointer_cursor skip_tutorial_event text_center position_relative">Skip tutorial</span>
							<video id="tutorial_video_id" src="//s3.amazonaws.com/jigyaasa_content_static/tutorial_000kF2.mp4" height="454px;width="399px" style="top:-30px;left:3px" class="position_relative">
							</video>
						</div>
					</div>
				</div>`;		
		},
		studySynonymHtml: ()=> {
			return `<div class="top_border"></div>					
					<div class="sub_container">
						<div class="study_subcontainer_shift_down"></div>
							<div class="study_sub_container float_right">
								<div class="study_block_container">
									<div class="study_word_row auto_margin float_left bold_font">
										<div class="float_left text_center study_word_title">Click a word to study its synonyms.</div>
										
									</div>
									<div class="study_words_sub_section clear_both">
										${this.wordsToStudy()}																										
									</div>	
									<div class="study_bar_row">
										<div class="study_bar float_left"></div>
										<div class="study_bar float_left study_bar_middle">
											<div class="study_next_btn_separater"></div>
											<div class="next_button_wrapper auto_margin">	
												<button class="study_word_next_event study_next_button white_color bold_font auto_margin" type="button" name="btn_study_next" id="btn_study_next">
													Next <i class="study_word_next_event fa fa-arrow-right" aria-hidden="true" style="font-size:13px;"></i>
												</button>							
											</div>	
										</div>
										<div class="study_bar float_left study_bar_right"></div>								
									</div>
								</div>
							</div>																
						</div>								
					</div>
					<div class="audio_row study_audio_row position_relative clear_both height_thirty">					
						<div class="controls_section auto_margin">
							<div class="circle_shape help_mark text_center float_left" style="pointer-events:none">
								&#63;
							</div>
							<div class="circle_shape help_mark text_center float_left" style="pointer-events:none">								
								<i class="fa fa-pause" aria-hidden="true"></i>
							</div>
							<div class="pointer_cursor sound_event circle_shape float_left" id="mute_unmute"> 								
								${this.changeSoundIcon()}
							</div>							
							<!-- Modal content -->
							<div class="synonym_modal_content auto_margin position_relative" id="synonym_modal">								
								<span class="close_button" id="close_btn">&times;</span>
								<h1 class="header_main_word bold_font"><span id="modal_header_text" style="border-left: 100px solid transparent"></span></h1>								
								<div class="synonym_modal_body">
									<div class="synonym_modal_body_subcontainer auto_margin" id="modal_data_section">									
									</div>
									<div class="synonym_modal_footer">					  
										${setTimeout(()=>{this.bindClickEventForStudyWords()})}
									</div>  
								</div>								
							</div>							
						</div>	
					</div>`;		
		},
		resultHtml: ()=> {
			return	`<div class="top_border"></div>	
					<div class="sub_container" style="float:left" id="sub_container5">
						<div class="title_editor_choice white_color text_center" id="head_title">Editor's Choice</div>
						<div class="score_row arial_font text_center">
							<div class="float_left text_right score_data_lbl">Score</div> 
							<div class="float_left score_data text_left">${this.score["key"]}</div> 
						</div>
						<div class="score_row arial_font text_center">
							<div class="float_left text_right score_data_lbl">Correct</div> 
							<div class="float_left score_data text_left">${this.totalCorrectAttempts["key"]}</span> of <span>${this.totalCorrectAttempts["key"] + this.totalIncorrectAttempts["key"]}</div>
						</div>
						<div class="score_row arial_font text_center" style="height:70px;">
							<div class="float_left text_right score_data_lbl">Average Level</div> 
							<div class="float_left score_data text_left">1</div>
						</div>	
						<div class="play_btn_row"> 
							<div class="continue_btn_wrapper auto_margin">
								<button class="btn_continue white_color continue_event" type="button" name="continue_btn" id="continue_button">
									<span class="continue_event font_twenty">Continue</span> <i class="continue_event fa fa-arrow-right" aria-hidden="true"></i>									
								</button>
							</div>								
						</div>
					</div>
					<div class="audio_row clear_both position_relative height_thirty">
					<div class="controls_section auto_margin">
						<div class="circle_shape help_mark text_center float_left" id="tutorial_icon" style="pointer-events:none">
							&#63;
						</div>
						<div class="circle_shape help_mark text_center float_left play_pause" id="btn_play_pause" style="pointer-events:none">														
							<i class="fa fa-pause play_pause" aria-hidden="true"></i>
						</div>
						<div class="pointer_cursor sound_event circle_shape float_left" id="mute_unmute"> 								
							${this.changeSoundIcon()}
						</div>
						<div style="height:460px;width:600px;top:-465px;left:-245px" class="position_relative no_appearance" id="tutorial_area">
							<span style="display:inline-block;height:30px;width:100px;background:#E3764B;border-radius:30px;color:#FFF;line-height:30px;top:3px;z-index:40;left:-102px" class="skip_tutorial_event text_center position_relative pointer_cursor">Skip tutorial</span>
							<video id="tutorial_video_id" src="//s3.amazonaws.com/jigyaasa_content_static/tutorial_000kF2.mp4" height="454px;width="399px" style="top:-30px;left:3px" class="position_relative">
							</video>
						</div>
					</div>
				</div>`;			
		
		},
		gameCompleteHtml: ()=> {
			return `<div class="sub_container_game_complete">
						<div class="game_complete_text bold_font position_relative arial_font">
							Game Complete
						</div>	
						<div class="your_score_lbl font_eighteen float_left bold_font position_relative arial_font" style="left: 5px;">
							Your Score 
						</div>					
						<div class="float_left socre_data bold_font text_center arial_font" style="line-height: 30px;">
							${this.score["key"]}
						</div>
						<div class="float_left top_socre_board position_relative" style="display: none">
							<div class="top_score_lbl bold_font arial_font common_font_size" style="height:35px;">
								YOUR TOP SCORES
							</div>
							${this.getTopScores()}						
						</div>
					</div>
					<div class="play_again_link pointer_cursor arial_font common_font_size position_relative" id="play_again_id" style="top: -10px">
						Play Again
					</div>`;			
		}
	}	
	this.sound_state = true;
	this.wrong_sound_state = "";	
	this.reset_time_interval = "";
	this.total_correct_opt = 0;
	// function to get id
	this._=(x)=> {
		return document.getElementById(x);
	}
	// same as inIt()		
	(()=> {					
		document.addEventListener("visibilitychange", ()=> {
			if (document.visibilityState == "hidden") {
				this.repeatedCodePause();			
			}			
		}, false);			
		document.addEventListener("click", (e)=> {
			if (e.target.className.match("synonym_event")) {					
				this.matchSynonyms(e.target.id, this.unique_rand_no);				
			}							
			if (e.target.id == "main-page") {
				this.repeatedCodePause();			
			}
			if (e.target.id == "play_again_id") {				
				this.playAgain();			
			}
			if (e.target.id == "tutorial_icon") {
				this.playTutorial();				
			}			
			if (e.target.className.match("study_word_next_event")) {
				this.loadPage("main_container_id", this.htmlTemplates.resultHtml());
			}			
			if (e.target.className == "close_button") {									        
				//this._("synonym_modal").style.display = "none";				
				this._("synonym_modal").style.transition = "top 0.5s, right 0.5s";
				this._("synonym_modal").style.top = "40px"; 	
				this._("synonym_modal").style.right = "0";				
				this.playSound("//s3.amazonaws.com/jigyaasa_content_static/snakehit_000kF4.mp3");
			}
			if (e.target.className.match("skip_tutorial_event")){
				this._("tutorial_video_id").pause();
				this._("tutorial_area").classList.add("no_appearance");
			}
			if (e.target.className.match("sound_event")) {
				if (this.sound_state) {					
					this.sound_state = false;
					this._("mute_unmute").innerHTML  = `<i class="sound_event fa fa-volume-off" aria-hidden="true"></i>`;	
				}
				else {					
					this.sound_state = true;					
					this._("mute_unmute").innerHTML = `<i class="sound_event fa fa-volume-up sound_on" aria-hidden="true"></i>`;
				}
			}									
			if (e.target.id == "pause_icon_id"){
				this._("play_pause_layer_id").classList.remove("play_pause_layer");
				this._("btn_play_pause").innerHTML = `<i class="fa fa-pause play_pause" aria-hidden="true"></i>`;	
				this.restart();				
			}					
			//play pause logic goes here on the main page
			if (e.target.className.match("play_pause")) {	
				if (this.timer_state == false) {
					this.timer_state = true;
					this._("btn_play_pause").innerHTML = `<i class="fa fa-pause play_pause" aria-hidden="true"></i>`;
					this.restart();										
				}
				else {
					this.timer_state = false; 
					this._("btn_play_pause").innerHTML = `<i class="fa fa-play play_pause" aria-hidden="true" style="padding-left:3px;"></i>`;
					this.pause();	
				}					
			}
			if (e.target.className.match("continue_event")) {				
				this.loadPage("main_container_id", this.htmlTemplates.gameCompleteHtml()); 						  
			}
			if (e.target.className.match("btn_play_event")) {				
				this.loadPage("main_container_id",this.htmlTemplates.playHtml());
				this.playSound("//s3.amazonaws.com/jigyaasa_content_static/start_game_000kFf.mp3");
			}				
		});		
		this.loadPage("main_container_id", this.htmlTemplates.homeHtml());			 		
		//this.loadPage("main_container_id", this.htmlTemplates.resultHtml()); 			 		
		this.reset_time_interval = setInterval(()=> {this.timer()}, 1000);			
	})() // self invoking function (object initialiser)	
	this.level = [];	
	this.studyWordsCollection = [];		
	this.timer_state = false; // to control the timer
	this.time_ineterval = 60;
	this.incorrectAttempt = [];
	this.incorrectAttempt["key"] = 0;
	this.score = [];	
	this.last_word_match = 0;
	this.last_matched_synonym = "";		
	this.totalCorrectAttempts = [];
	this.totalCorrectAttempts["key"] = 0;
	this.totalIncorrectAttempts = [];
	this.totalIncorrectAttempts["key"] = 0;
	this.last_incorrect_word = "";	
	this.score["key"] = 0;
	this.suggestionData = [];
	this.suggestionData["key"] = "";
	this.synonymMatchCount = [];
	this.wordIndex = [];	
	this.wordCount = [];
	this.wordCount["key"] = 1;
	//Storing level when the user clicks on level box
	this.storeLevel = function(level_param) {			
		this.level["key"] = level_param;			
		this.loadPage("main_container_id",this.htmlTemplates.playHtml());			
	}	
	// generating unique random number
	this.count = 0;
	this.unique_rand_no;
	this.lastValues = [];
	this.util = {
		randomNumber: (max_value)=> {
			if (this.count >= max_value) {
				return false;
			}	
			let rand = Math.floor(Math.random() * max_value);
			for(let i in this.lastValues) {
				if (rand == this.lastValues[i]) {			
					this.util.randomNumber(max_value);
					return ;					
				}				
			}				
			this.lastValues.push(rand);			
			this.unique_rand_no = rand;
			this.count++;
		}
	}		
}
EditorChoice.prototype.playTutorial = function () {
	this._("tutorial_video_id").currentTime=0;
	this._("tutorial_video_id").pause();
	this._("tutorial_video_id").currentTime = 0;
	this._("tutorial_video_id").load();
	this._("tutorial_area").classList.remove("no_appearance");
	this._("tutorial_video_id").style.display = "block";
	this._("tutorial_video_id").play();	
}
EditorChoice.prototype.playAgain = function() {
	this.count = 0;
	this.unique_rand_no;
	this.lastValues = [];
	this.sound_state = true;	
	this.reset_time_interval = "";
	this.level = [];	
	this.studyWordsCollection = [];		
	this.timer_state = false; // to control the timer
	this.time_ineterval = 60;
	this.incorrectAttempt = [];
	this.incorrectAttempt["key"] = 0;
	this.score = [];	
	this.last_word_match = 0;
	this.last_matched_synonym = "";		
	this.totalCorrectAttempts = [];
	this.totalCorrectAttempts["key"] = 0;
	this.totalIncorrectAttempts = [];
	this.totalIncorrectAttempts["key"] = 0;
	this.last_incorrect_word = "";	
	this.score["key"] = 0;
	this.suggestionData = [];
	this.suggestionData["key"] = "";
	this.synonymMatchCount = [];
	this.wordIndex = [];	
	this.wordCount = [];	
	this.wordCount["key"] = 1;
	this.total_correct_synonyms = 0;
	this.loadPage("main_container_id", this.htmlTemplates.homeHtml());	
	this.reset_time_interval = setInterval(()=> {this.timer()}, 1000);		 		
}
EditorChoice.prototype.repeatedCodePause =  function() {
	if (this._("play_pause_layer_id")) {
		//this._("play_pause_layer_id").classList.add("play_pause_layer");
		this._("play_pause_layer_id").setAttribute("class","play_pause_layer clear_both white_color");
		this.pause();
		this._("btn_play_pause").innerHTML = `<i class='fa fa-play play_pause' aria-hidden='true' style="padding-left:3px;"></i>`;
	}	
}
EditorChoice.prototype.playSound = function(sound_source) {
	let play_sound = new Audio();
	play_sound.src = sound_source;	
	if (this.sound_state) {
		play_sound.play();	
	}	
}
EditorChoice.prototype.changeSoundIcon = function() {
	if (this.sound_state) {		
		return  `<i class="sound_event fa fa-volume-up sound_on" aria-hidden="true"></i>`;		
	}
	else {		
		return `<i class="sound_event fa fa-volume-off" aria-hidden="true"></i>`;	
	}
}
EditorChoice.prototype.createBars = function(total_bars) {
	let content = "";
	for (let i = 1;i <= total_bars;i++) {
		content +=  `<div class="time_bar" id="bar${i}"></div>`;
	}
	return content;
}
EditorChoice.prototype.bindClickEventForStudyWords = function() {
	let synonyms_array = document.getElementsByClassName("study_event");		
	for(let i = 0;i < synonyms_array.length;i++){
		synonyms_array[i].addEventListener("click", ()=> {
			this.loadDataInModal(synonyms_array[i].innerHTML, 5);	// ajax function called		
		});
	}
}
EditorChoice.prototype.loadDataInModal = function(word, len){ // sending request using ajax
	let xhttp = new XMLHttpRequest();
	let _this = this;	 	
	xhttp.onreadystatechange = ()=> {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			let json_arr = JSON.parse(xhttp.responseText);
			let data = "";
			for(let i in json_arr)	{
				data += `<div class="float_left modal_synonym text_center bold_font" style="font-size:16px">${json_arr[i]["word"]}</div>`;									
			}
			//document.getElementById("modal_data_section").innerHTML = data;			
			_this._("modal_header_text").innerHTML = word;
			_this._("modal_data_section").innerHTML = data;				
			_this._("synonym_modal").style.transition = "top 0.5s, right 0.5s";
			_this._("synonym_modal").style.top = "-400px"; 	
			_this._("synonym_modal").style.right = "195px";				
			_this.playSound("audio/snakeatt.mp3");			        			
		}
	};
  xhttp.open("GET", "http://api.datamuse.com/words?max=" + len + "&ml=" + word, true);
  xhttp.send();
}
EditorChoice.prototype.timer = function(){
	if (this.time_ineterval == 0) {
		if(this.score["key"] < 0) {
			this.score["key"] = 0;
		}
		//console.log("Times up");
		clearInterval(this.reset_time_interval);	
		let system_date = new Date();
		this.setCookie("score", (this.score["key"].toString()), 10);		
		this.loadPage("main_container_id", this.htmlTemplates.studySynonymHtml()); 
	}	
	if ((this.timer_state == true) && (this.time_ineterval != 0)) {		
		let parent_level_bar = this._("level_bar");
		let child_level_bar = this._("bar" + this.time_ineterval);		
		parent_level_bar.removeChild(child_level_bar);
		this.time_ineterval--;
		this._("time_left").innerHTML = this.time_ineterval;		
	}	
}
EditorChoice.prototype.wordsToStudy = function() {
	let content_div = "";
	let synonym_collection = "";
	for(let main_word in this.studyWordsCollection) {
		synonym_collection = "";
		for(let synonyms in this.studyWordsCollection[main_word]){
			synonym_collection += `<div class="study_event text_center study_word_color pointer_cursor">${this.studyWordsCollection[main_word][synonyms]}</div>`			
		}
		content_div += `<div class="study_words_block float_left">
							<div class="study_event text_center bold_font main_word_color pointer_cursor">${main_word}</div>
							${synonym_collection}									
						</div>`;			
			 
   }
   return content_div;
} 
EditorChoice.prototype.counter = function() {	
	if ((this.counter.count == 2) || (typeof this.counter.count == "undefined")) {
		this.counter.count = 0;
	}   
   //this.counter.count++;   
   return ++this.counter.count;
}
EditorChoice.prototype.matchSynonyms = function(id,word_index_no) {		
	let current_synonym_id = this._(id);
	current_synonym_id.style.pointerEvents="none";
	let current_synonym = current_synonym_id.innerText;	
	let single_word_obj = Object.values(this.gameData.synonymList.words)[word_index_no];	
	//let single_word_obj=Object.values(this.gameData.synonymList.words)[word_index_no]; 	
	let flag = false;
	let main_word;	
	let truncated_word;
	for (let i in single_word_obj) {			
		let last_index_no = single_word_obj[i].lastIndexOf("*");
		truncated_word = single_word_obj[i].replace(/\*/gi,'');
		if ((current_synonym==truncated_word)&&(last_index_no == 1)) {			
			flag = true;			
		}
		if (last_index_no==2) {
			main_word = truncated_word;			
		}			
	}			
	if (flag) {
		let correct_synonym_count = 0;		
		this.playSound("audio/first_match.mp3");
		current_synonym_id.innerHTML=`<div class="synonyms noselect text_center pointer_cursor"><span class="synonym_event oval" style="padding:10px">${current_synonym}</span></div>`;
		//current_synonym_id.classList.add("oval");		
		this._("tick_box" + this.total_correct_opt).classList.add("add_tick");	
		this.total_correct_opt--;					
		if (this.last_matched_synonym != current_synonym) {	
			correct_synonym_count = this.counter();
			this.timer_state = true;
		}				
		this.totalCorrectAttempts["key"]++;			
		if (this.total_correct_opt == 0) {					
			this.playSound("audio/first_match.mp3");
			this.wrong_sound_state = "";			
			this.score["key"] += 10;
			this._("score_lbl").innerHTML = this.score["key"];
			this.last_word_match = current_synonym;			
			this.level["key"] = 1; 
			if ((this.util.randomNumber(this.gameData.synonymList.words.length)) != false) { 							
				this.wordCount["key"] += 1;
				this._("wordCount").innerHTML=this.wordCount["key"];				
				let word_list_section = document.getElementById("word_list"); // changing the word list				
				this._("word_list").style.transition = "left 1s,transform 0.8s,top 0.8s,opacity 0.8s";
				this._("word_list").style.left = "-80px";
				this._("word_list").style.top = "20px";
				this._("word_list").style.transform = "rotate(10deg)";
				this._("word_list").style.opacity = "0";				
				setTimeout(()=> {
					this._("word_list").style.transition = "none";										
					this._("word_list").style.left = "0";
					this._("word_list").style.transform = "rotate(0deg)";
					this._("word_list").style.top = "0";					
					this._("word_list").style.opacity = "1";
					word_list_section.innerHTML = this.loadWords(this.level["key"],this.unique_rand_no);				
				}, 700);				
			}
			else {
				if(this.score["key"] < 0) {
					this.score["key"] = 0;
				}
				var system_date = new Date();
				this.setCookie("score", (this.score["key"].toString()), 10);				
				clearInterval(this.reset_time_interval);												
				this.loadPage("main_container_id", this.htmlTemplates.studySynonymHtml())
				this.wordsToStudy();
			}	
		}
		this.last_matched_synonym = current_synonym;
	}
	else {
		this.timer_state = true;			
		//current_synonym_id.classList.add("strikethrough");
		current_synonym_id.innerHTML=`<div class="synonyms noselect text_center pointer_cursor"><span class="synonym_event strikethrough" style="padding:10px">${current_synonym}</span></div>`;
		if ((this.wrong_sound_state == "") || (this.wrong_sound_state != current_synonym_id.id)) {				
			this.playSound("audio/wrong.mp3");				
		}			
		this.wrong_sound_state=current_synonym_id.id;			
		if (this.incorrectAttempt["key"] != "011") {
			this.suggestionData["key"] = "";
		}						
		if (this.last_incorrect_word != current_synonym) {
			this.score["key"] += -1;
			this.totalIncorrectAttempts["key"]++;				
			this.last_incorrect_word = current_synonym;
			this._("score_lbl").innerHTML = this.score["key"];				
			this.incorrectAttempt["key"] += "1";
		}		
		if (this.incorrectAttempt["key"] == "011") {
			this._("user_suggestion").innerHTML = "Let's try again. The words \"" + current_synonym + "\"" + " and \"" + main_word+"\"" + " don't have similar meanings. Click the the word most similar to " + "\"" + main_word + ".\"";				
			this._("user_suggestion_id").style.transition = "top 1s"; 				
			this._("user_suggestion_id").style.top = "-50px";
			setTimeout(()=>{
				if(this._("user_suggestion_id")) {
					this._("user_suggestion_id").style.transition = "top 2s"; 				
				}
				if(this._("user_suggestion_id")) {
					this._("user_suggestion_id").style.top = "52px";
				}				
			},3000);			
		}		
	}		
}
EditorChoice.prototype.loadWords = function(level,word_index) {			
	let studyWords = [];
	let content = "";
	let id_no = 1;
	let extracted_obj = "";	
	let array_collection = (Object.values(this.gameData.synonymList)[0]);
	let singleArrayObject = (Object.values(array_collection)[word_index]);
	var data = "";
	let word = "";
	this.total_correct_opt = 0;	
	for (let i in singleArrayObject) {
		let last_index = singleArrayObject[i].lastIndexOf("*");
		let truncated_word = singleArrayObject[i].replace(/\*/gi,'');
		if ((last_index == 1) || (last_index == -1)) {
			extracted_obj += `<div class="synonym_event synonyms noselect text_center pointer_cursor" id="Synonym${id_no}>
									<span style="padding:10px">${truncated_word}</span>
							  </div>`;								
		}
		if (last_index == 2) {
			word = truncated_word;						
		}
		if (last_index == 1) {
			this.total_correct_opt++;
		}
		if(last_index == 0) {
			studyWords.push(truncated_word);
		}			
		id_no++;		
	}
	let tick_box = "";		
	for(let i = 1 ; i<=this.total_correct_opt;i++) {
		tick_box += `<div id='tick_box${i}' class='tick_box float_right'></div>`;
	}
	this.studyWordsCollection[word] = studyWords;	
	content = "<div id='top' class='word_list_top noselect height_fourty pink_background'>" + word + tick_box +"</div>";
	content += extracted_obj;	
	return content;	
}
EditorChoice.prototype.setCookie = function(cname, cvalue, exdays) {
	var d = new Date();
	var current_date  = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();
	current_date = current_date.toString();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toGMTString();
	var getcookie_data  = this.getCookie(cname);
	if(getcookie_data) {
		var parsed_obj = JSON.parse(getcookie_data);		
		parsed_obj[cvalue] = current_date;
		document.cookie = cname + "=" + JSON.stringify(parsed_obj) + ";" + expires + ";path=/";
	}	
	else {
		var obj={};		
		obj[cvalue] = current_date;
		document.cookie = cname + "=" + JSON.stringify(obj) + ";" + expires + ";path=/";
	}
}
EditorChoice.prototype.getCookie = function(cname) {
	var cookie_str = document.cookie;	
	var arr = cookie_str.split(";");	
	var get_obj = "";
	var separate_arr;
	for(let i in arr) {
		separate_arr=arr[i].split("=");			
		var str_cmp = separate_arr[0].trim().localeCompare(cname);
		if(str_cmp == 0) {
			get_obj = separate_arr[1];	
			//console.log(get_obj)	
		}
	}	
	if (get_obj.length == 0) {
		return false;	
	}
	else {
		return get_obj;
	}	
}
EditorChoice.prototype.getTopScores = function() {
	let cookie_array = JSON.parse(this.getCookie("score"));
	let object_keys = Object.keys(cookie_array);	
	let content_div = "";		
	let sr_no = 1;
	let score_date = "";
	let system_date = new Date();
	let current_date = system_date.getDate() + "/" + (system_date.getMonth()+1) + "/" + system_date.getFullYear();	
	let object_len = object_keys.length;	
	object_len  = object_len-1;
	let flag;
	for (object_len;object_len>=0;object_len--){
		score_date = cookie_array[object_keys[object_len]];
		flag = current_date.localeCompare(score_date) 
		if (flag == 0) {
			score_date = "Today";
		}		
		content_div += `
		<div class="top_score_data_row bold_font arial_font common_font_size">
		<span class="top_score_sr bold_font arial_font common_font_size inline_block" style="width:30px;">${sr_no}.</span>
		<span class="top_score_data bold_font inline_block" style="width:40px;">${object_keys[object_len]}</span>
		<span class="score_date inline_block" style="width:100px;">${score_date}</span>
		</div>`;
		if(sr_no == 5) {
			break;
		}			
		sr_no++;
	}	
	return content_div;		
}
EditorChoice.prototype.loadPage = function(id,htmlData) {
	this._(id).innerHTML = htmlData;
}
EditorChoice.prototype.pause = function () {
	if (this._("play_pause_layer_id")) {
		this._("play_pause_layer_id").setAttribute("class","play_pause_layer white_color position_relative");
		this.timer_state = false;		
	}	
}
EditorChoice.prototype.restart = function () {
	this._("play_pause_layer_id").classList.remove("play_pause_layer");
	this.timer_state = true;
}
var e = new EditorChoice(); // instance created

