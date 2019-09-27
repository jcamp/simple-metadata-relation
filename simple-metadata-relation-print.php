<?php
/**
 * Print post related content(Book info, Chapter) to the books4languages-book-child-theme-for-pressbooks.
 *
 * @package simple-metadata-relation-print
 * @since 1.0.3
 *
 */

	defined ("ABSPATH") or die ("Action denied!");

  function getCurrentPostRelations($location){
		global $wpdb;
		global $wp;

		// set variables for choosen print location
		if($location == "book-info"){
			$table_name = $wpdb->prefix . 'posts';
			$result =  $wpdb->get_row("SELECT ID FROM $table_name WHERE post_name = 'book-information';");
			$result = get_object_vars($result);
			$post_id= reset($result);
			$setClassPrefix = "dropdown-relations-content-bookinfo";

		} else if($location == "chapter"){
			$post_id =  get_the_id();
			$setClassPrefix = "dropdown-relations-content-chapters";
		}

// get post_meta of each relation
if(!empty($post_id)){
	$excercises = get_post_meta( $post_id, 'smdre_resources_quizzes');
	$activities = get_post_meta( $post_id, 'smdre_resources_activities');
	$audios = get_post_meta( $post_id, 'smdre_resources_audios');
	$videos = get_post_meta( $post_id, 'smdre_resources_videos');
	$citations = get_post_meta( $post_id, 'smdre_bibliography_citations');
}

//print icons of related content based on its presence and quantity
	 	if( !empty($excercises) && !empty(array_filter($excercises))){
	    if (count($excercises) === 1) {
	      echo '<a href="' . $excercises[0] . '" class="dropdown-relations-tooltip"> <img width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_assignment_white_18dp.png"><span class="dropdown-relations-tooltiptext">Excercise</span></a>';
	    } else {
	      echo "<a onClick='mls_toggleRelationDropdowns(event, \"$setClassPrefix-excercises\", \"". $location ."\")'class='dropdown-relations-tooltip'><img width='36' height='36' src='/wp-content/plugins/simple-metadata-relation/assets/icons/outline_assignment_white_18dp.png'><span class='dropdown-relations-tooltiptext'>Excercises</span></a>";
				echo "<div id ='$setClassPrefix-excercises'>";
				echo "<ul>";
	      foreach ($excercises as $excercise) {
	        echo '<li> <a href="' . $excercise . '"> Excercise </a></li>';
	        }
	        echo '</ul></div>';
	    }
	  }	else {
				echo '<a class="dropdown-relations-tooltip"><img class="dropdown-relations-item-inactive dropdown-relations-tooltip" width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_assignment_white_18dp.png"><span class="dropdown-relations-tooltiptext">No excercises</span></a>';
		}

		if( !empty($activities) && !empty(array_filter($activities))){
			if (count($activities) === 1) {
				echo '<a href="' . $activities[0] . '" class="dropdown-relations-tooltip"> <img width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_group_work_white_18dp.png"><span class="dropdown-relations-tooltiptext">Activity</span></a>';
			} else {
				echo "<a onClick='mls_toggleRelationDropdowns(event, \"$setClassPrefix-activities\", \"". $location ."\")' class='dropdown-relations-tooltip'><img width='36' height='36' src='/wp-content/plugins/simple-metadata-relation/assets/icons/outline_group_work_white_18dp.png'><span class='dropdown-relations-tooltiptext'>Activities</span></a>";
				echo "<div  id ='$setClassPrefix-activities'>";
				echo "<ul>";
				foreach ($activities as $activity) {
					echo '<li> <a href="' . $activity . '"> Activity </a></li>';
					}
					echo '</ul></div>';
			}
		} else {
				echo '<a class="dropdown-relations-tooltip"><img class="dropdown-relations-item-inactive" width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_group_work_white_18dp.png"><span class="dropdown-relations-tooltiptext">No activities</span></a>';
		}

		if( !empty($audios) && !empty(array_filter($audios))){
			if (count($audios) === 1) {
				echo '<a href="' . $audios[0] . '" class="dropdown-relations-tooltip"> <img width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_audiotrack_white_18dp.png"><span class="dropdown-relations-tooltiptext">Audio</span></a>';
			} else {
				echo "<a onClick='mls_toggleRelationDropdowns(event, \"$setClassPrefix-audios\", \"". $location ."\")' class='dropdown-relations-tooltip'><img width='36' height='36' src='/wp-content/plugins/simple-metadata-relation/assets/icons/outline_audiotrack_white_18dp.png'><span class='dropdown-relations-tooltiptext'>Audios</span></a>";
				echo "<div id ='$setClassPrefix-audios'>";
				echo '<ul>';
				foreach ($audios as $audio) {
					echo '<li> <a href="' . $audio . '"> Audios </a></li>';
					}
					echo '</ul></div>';
			}
		} else {
				echo '<a class="dropdown-relations-tooltip"><img class="dropdown-relations-item-inactive" width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_audiotrack_white_18dp.png"><span class="dropdown-relations-tooltiptext">No audios</span></a>';
		}

	if( !empty($videos) && !empty(array_filter($videos))){
			if (count($videos) === 1) {
				echo '<a href="' . $videos[0] . '"class="dropdown-relations-tooltip"> <img width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_video_library_white_18dp.png"><span class="dropdown-relations-tooltiptext">Video</span></a>';
			} else {
				echo "<a onClick='mls_toggleRelationDropdowns(event, \"$setClassPrefix-videos\", \"". $location ."\")' class='dropdown-relations-tooltip'><img width='36' height='36' src='/wp-content/plugins/simple-metadata-relation/assets/icons/outline_video_library_white_18dp.png'><span class='dropdown-relations-tooltiptext'>Videos</span></a>";
				echo "<div id ='$setClassPrefix-videos'>";
				echo '<ul>';
				foreach ($videos as $video) {
					echo '<li> <a href="' . $video . '"> Video </a></li>';
					}
					echo '</ul></div>';
			}
		} else {
				echo '<a class="dropdown-relations-tooltip"><img class="dropdown-relations-item-inactive" width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_video_library_white_18dp.png"><span class="dropdown-relations-tooltiptext">No videos</span></a>';
		}

		if( !empty($citations) && !empty(array_filter($citations))){
				if (count($citations) === 1) {
					echo '<a href="' . $citations[0] . '"class="dropdown-relations-tooltip"> <img width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_chrome_reader_mode_white_18dp.png"><span class="dropdown-relations-tooltiptext">Citation</span></a>';
				} else {
					echo "<a onClick='mls_toggleRelationDropdowns(event, \"$setClassPrefix-citations\", \"". $location ."\")' class='dropdown-relations-tooltip'><img width='36' height='36' src='/wp-content/plugins/simple-metadata-relation/assets/icons/outline_chrome_reader_mode_white_18dp.png'><span class='dropdown-relations-tooltiptext'>Citations</span></a>";
					echo "<div id ='$setClassPrefix-citations'>";
					echo '<ul>';
					foreach ($citations as $citation) {
						echo '<li> <a href="' . $citation . '"> Citation </a></li>';
						}
						echo '</ul></div>';
				}
			} else {
					echo '<a class="dropdown-relations-tooltip"><img class="dropdown-relations-item-inactive" width="36" height="36" src="/wp-content/plugins/simple-metadata-relation/assets/icons/outline_chrome_reader_mode_white_18dp.png"><span class="dropdown-relations-tooltiptext">No citations</span></a>';
			}
  }
