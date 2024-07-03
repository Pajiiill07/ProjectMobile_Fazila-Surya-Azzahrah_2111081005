import 'package:flutter/material.dart';
import 'dart:math';
import 'package:carousel_slider/carousel_slider.dart';
import 'package:frontend_projectmobile/model/department_model.dart';

class SlideDpt extends StatelessWidget {
  final List<Department> departments;

  SlideDpt({required this.departments});

  Color getRandomPastelColor() {
    final Random random = Random();
    int r = random.nextInt(128) + 127; // Values between 127 and 255
    int g = random.nextInt(128) + 127; // Values between 127 and 255
    int b = random.nextInt(128) + 127; // Values between 127 and 255

    return Color.fromARGB(255, r, g, b);
  }

  @override
  Widget build(BuildContext context) {
    return CarouselSlider(
      options: CarouselOptions(
        height: 200.0,
        autoPlay: true,
        enlargeCenterPage: true,
        aspectRatio: 1/1,
        viewportFraction: 0.8,
      ),
      items: departments.map((department) {
        return Builder(
          builder: (BuildContext context) {
            return Container(
              width: MediaQuery.of(context).size.width,
              margin: EdgeInsets.symmetric(horizontal: 5.0),
              decoration: BoxDecoration(
                color: getRandomPastelColor(),
                borderRadius: BorderRadius.circular(10),
              ),
              child: Padding(
                padding: const EdgeInsets.all(15),
                child: Center(
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Text(
                        department.namaDepartment,
                        style: TextStyle(
                          fontSize: 18,
                          fontWeight: FontWeight.w700,
                          fontFamily: 'Poppins',
                          color: Colors.black54
                        ),
                      ),
                      SizedBox(height: 10),
                      Text(
                        department.deskripsi,
                        textAlign: TextAlign.center,
                        style: TextStyle(
                          fontSize: 13,
                          fontWeight: FontWeight.w500,
                          fontFamily: 'Poppins',
                          color: Colors.black54
                        ),
                        overflow: TextOverflow.ellipsis,
                        maxLines: 3,
                      ),
                    ],
                  ),
                ),
              ),
            );
          },
        );
      }).toList(),
    );
  }
}
