import { Component, OnInit } from '@angular/core';
import { SliderService } from 'src/services/slider.service';
import { InstructorService } from 'src/services/instructor.service';
import { GeneralService } from 'src/services/general.service';
import { BlogService } from 'src/services/blog.service';

@Component({
  selector: 'app-about-us',
  templateUrl: './about-us.component.html',
  styleUrls: ['./about-us.component.scss']
})
export class AboutUsComponent implements OnInit {

  constructor(
    private sliderService : SliderService,
    private instructorService : InstructorService,
    private blogService : BlogService
  ) { }

  public carouselOptions : any = GeneralService.CAROUSEL_OPTIONS;

  public sliders : any = [];
  public instructors : any = [];
  public blogs : any = [];

  ngOnInit() {

  
  }




}
