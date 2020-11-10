import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
    name: 'filterfor',
    pure: false
})
export class FilterForPipe implements PipeTransform {
    transform(value: any, args?: any, key : any = ''): any {
        if (!args)
            return value;
        return value.filter(
            item => item[key].toLowerCase().indexOf(args.toLowerCase()) > -1
        );
    }
}