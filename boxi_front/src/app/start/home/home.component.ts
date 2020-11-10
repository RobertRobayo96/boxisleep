import { Component, OnInit } from '@angular/core';
import { SliderService } from 'src/services/slider.service';
import { InstructorService } from 'src/services/instructor.service';
import { GeneralService } from 'src/services/general.service';
import { BlogService } from 'src/services/blog.service';
import { TrainingService } from 'src/services/training.service';
declare const loadSlider: any;

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  constructor(
    private sliderService : SliderService,
    private instructorService : InstructorService,
    private blogService : BlogService,
    private trainingService : TrainingService
  ) { }

  public carouselOptions : any = GeneralService.CAROUSEL_OPTIONS;

  public sliders : any = [];
  public instructors : any = [];
  public blogs : any = [];
  public trainings : any = [];

  ngOnInit() {
    this.listBlog();
    this.listInstructors();
    this.listSliders();
    this.listTrainings();
  }

  listSliders(){
    this.sliderService.all().subscribe(
  		response => {
        this.sliders = response;
        loadSlider();
  		},
  		error => {
  			console.log(<any>error);
  		}
    );
  }

  listTrainings(){
    this.trainingService.getImportants().subscribe(
  		response => {
        this.trainings = response;
  		},
  		error => {
  			console.log(<any>error);
  		}
    );
  }

  listInstructors(){
    this.instructorService.all().subscribe(
  		response => {
        this.instructors = response;
  		},
  		error => {
  			console.log(<any>error);
  		}
    );
  }

  listBlog(){
    this.blogService.all().subscribe(
  		response => {
        this.blogs = response;
        console.log(this.blogs);
  		},
  		error => {
  			console.log(<any>error);
  		}
    );
  }


}
