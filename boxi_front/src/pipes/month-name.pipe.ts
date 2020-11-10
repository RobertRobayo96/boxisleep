import { Pipe, PipeTransform } from '@angular/core';

@Pipe({ name: 'monthname' })
export class MonthNamePipe implements PipeTransform{
    transform(monthNumber) {
        var monthNames = [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ];
        return monthNames[monthNumber - 1];
    }
}