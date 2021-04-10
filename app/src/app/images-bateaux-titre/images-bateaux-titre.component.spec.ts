import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ImagesBateauxTitreComponent } from './images-bateaux-titre.component';

describe('ImagesBateauxTitreComponent', () => {
  let component: ImagesBateauxTitreComponent;
  let fixture: ComponentFixture<ImagesBateauxTitreComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ImagesBateauxTitreComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ImagesBateauxTitreComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
