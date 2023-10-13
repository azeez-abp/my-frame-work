resource "aws_internet_gateway" "ab_gateway" {
  vpc_id = aws_vpc.abp_main_vpc.id
  tags = {
    name = "igw"
  }


}
