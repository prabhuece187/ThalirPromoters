<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Property extends Model
{
        protected $table="tbl_property";
        protected $primaryKey="PropertyId";
        protected $fillable = [
              'PropertyName',
              'TypeName',
              'KnowusName',
              'NeedName',
              'RoofName',
              'FloorName',
              'PurposeName',
              'AreaName',
              'RoadName',
              'id',
              'TypeId',
              'FloorId',
              'PropertyDate',
              'RoofId',
              'AreaId',
              'PurposeId',
              'NeedId',
              'RoadId',
              'KnowusId',
              'PropertyLandSize',
              'PropertyTotalBudget',
              'PropertyTotalValType',
              'PropertyRentAmount',
              'PropertyAdvanceAmount',
              'PropertyAreaDetail',
              'PropertyRoadType',
              'PropertyRoadSize',
              'PropertyRoadBase',
              'PropertyDescription',
              'PropertyBuildingSize',
              'PropertyBuildingStatus',
              'PropertyGalleryVideo',
              'PropertyLocation',
              'PropertyLocationSpot',
              'PropertyOwnerName',
              'PropertyOwnerNumber',
              'PropertyReferName',
              'PropertyReferNumber',
              'PropertyBuildNorth',
              'PropertyBuildSouth',
              'PropertyBuildEast',
              'PropertyBuildWest',
              'PropertyBuildCorner',
              'PropertyNorth',
              'PropertySouth',
              'PropertyWest',
              'PropertyEast',
              'PropertyCorner',
              'PropertyStatus',
              'PropertyPendingReason',
              'PropertyRegNo',
              'PropertyUserStatus',
              'ReachUs',
              'PropertyBuildingAge',
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}
